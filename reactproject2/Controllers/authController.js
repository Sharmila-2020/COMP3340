const User = require('../Data/User');
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');

//Handles the GET server request to relese the access tokens a user has after logging in
//The back end server defines this in server.js
const handleLogin = async (req, res) => {
    
    const user = req.body.username;
    const pwd = req.body.password;
    if (!user || !pwd) return res.sendStatus(400).json({ 'message': 'Username and password are required.' });

    const foundUser = await User.findOne({username: user}).exec();
    if (!foundUser) return res.sendStatus(401); //unauthorized

    //evaluate password
    const match = await bcrypt.compare(pwd, foundUser.password);
    if (match) {
        const roles = Object.values(foundUser.roles).filter(Boolean);

        //create JWTs
        const accessToken = jwt.sign(
            {
                "UserInfo": {
                    "username": foundUser.username,
                    "roles" : roles
                }
            },
            process.env.ACCESS_TOKEN_SECRET,
            { expiresIn: '10m' }
        );
        const refreshToken = jwt.sign(
            { "username": foundUser.username },
            process.env.REFRESH_TOKEN_SECRET,
            { expiresIn: '1d' }
        );

        foundUser.refreshToken = refreshToken;
        result = await foundUser.save();
        console.log(result);

        res.cookie('jwt', refreshToken, { httpOnly: true, sameSite: 'None', secure: true, maxAge: 24 * 60 * 60 * 1000 }); //, secure: true
        res.json({ roles, accessToken });
    } else {
        res.sendStatus(401);
    }
}

module.exports = { handleLogin };