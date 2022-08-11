const User = require('../Data/User');


//Handles the POST server request to authenticate a user from the database
//The back end server defines this in server.js
const handleLogout = async (req, res) => {
    //On client, also delete access token
    
    const cookies = req.cookies;
    if (!cookies?.jwt) return res.sendStatus(204); //no content
    const refreshToken = cookies.jwt;

    const foundUser = await User.findOne({refreshToken}).exec();
    if (!foundUser) {
        res.clearCookie('jwt', { httpOnly: true, sameSite: 'None', secure: true });
        return res.sendStatus(204);
    }

    //remove user access tokens
    foundUser.refreshToken = '';
    const result = await foundUser.save();
    console.log(result);

    res.clearCookie('jwt', { httpOnly: true, sameSite: 'None', secure: true }); //secure : true => only serve on https
    res.sendStatus(204);
}

module.exports = { handleLogout };