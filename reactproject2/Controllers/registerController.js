const User = require('../Data/User');
const bcrypt = require('bcrypt');

//handles the POST server request the registers a new user to the database
//The back end server defines this in server.js
const handleNewUser = async (req, res) => {
    const user = req.body.username;
    const pwd = req.body.password;

    if (!user || !pwd) return res.sendStatus(400).json({ 'message': 'Username and password are required.' });
    
    //check for duplicate usernames in database
    const duplicate = await User.findOne({username: user}).exec();
    if (duplicate) return res.status(409); // conflict

    try {
        //encrypt password
        const hashedPwd = await bcrypt.hash(pwd, 10);
        //create and store new user
        const result = await User.create({
            "username": user,
            "password": hashedPwd
        });
        console.log(result);

        res.status(201).json({ 'success':  `New user ${user} created`})
    } catch (err) {
        res.status(500).json({ 'message': err.message });
    }
}

module.exports = { handleNewUser };