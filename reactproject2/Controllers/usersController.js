<<<<<<< HEAD
const User = require('../Data/User');

//function that handles GET requests from '/users' in the backend server
const getAllUsers = async (req, res) => {
    //returns all users
    const users = await User.find();
    if(!users) return res.sendStatus(204).json({'message': 'No users found.'});
    res.json(users);
}

//function that handles POST requests from '/users' in the backend server
const createNewUser = async (req, res) => {
    //if username or password is not defined
    if(!req?.body?.username || !req?.body?.password){
        //send bad request response
        return res.sendStatus(400).json({'message':'Username and password are required.'});
    }

    try{
        const result = await User.create({
            username: req.body.username,
            password: req.body.password
        });

        res.sendStatus(201).json(result);
    }catch(err){
        console.log(err);
    }
}
//function that handles PUT requests from '/users' in the backend server
const updateUser = async (req, res) => {
    //if id is not defined
    if(!req?.body?.id){
        //send bad request response
        return res.sendStatus(400).json({'message':'User ID is required.'});
    }

    const user = await User.findOne({_id: req.body.id}).exec();
    //if user is not found return an error
    if (!user) {
        return res.sendStatus(204).json({ "message": `User ID does not match ${req.body.id}` });
    }
    // else check which fields are being updated and update them
    if (req.body?.username) user.username = req.body.username;
    if (req.body?.password) user.password = req.body.password;

    const result = await user.save();
    res.json(result);
}

//function that handles DELETE requests from '/users' in the backend server
const deleteUser = async (req, res) => {
    //if id is not defined
    if(!req?.body?.id){
        //send bad request response
        return res.sendStatus(400).json({'message':'User ID is required.'});
    }

    const user = await User.findOne({_id: req.body.id}).exec();
    //if user is not found return an error
    if (!user) {
        return res.sendStatus(204).json({ "message": `User ID does not match ${req.body.id}` });
    }
    result = await user.deleteOne({_id: req.body.id});
    res.json(result);
}

//function that handles GET requests from '/users/id' in the backend server for getting a specific user
const getUser =  async (req, res) => {
    if(!req?.params?.id) return res.sendStatus(400).json({'message':'User ID is required.'});

    const user = await User.findOne({_id: req.params.id}).exec();
    //if user is not found return an error
    if (!user) {
        return res.sendStatus(204).json({ "message": `User ID does not match ${req.params.id}` });
    }
    res.json(user);
=======
const uuid = require('uuid');
const data = {};
data.users = require('../../Data/users.json');

const getAllUsers = (req, res) => {
    res.json(data.users);
}

const createNewUser = (req, user) => {
    res.json({
        "id": uuid(),
        "username": req.body.username,
        "password": req.body.password,
        "admin": '0'
    });
}

const updateUser = (req, user) => {
    res.json({
        "id": req.body.id,
        "username": req.body.username,
        "password": req.body.password,
        "admin": req.body.admin
    });
}

const deleteUser = (req, user) => {
    res.json({
        "id": req.body.id
    });
}

const getUser = (req, user) => {
    res.json({
        "id": req.body.id
    });
>>>>>>> 5e482f5b9a3822538562c262c66111d086ea3c30
}

module.exports = {
    getAllUsers,
    createNewUser,
    updateUser,
    deleteUser,
    getUser
};