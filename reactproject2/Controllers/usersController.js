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
}

module.exports = {
    getAllUsers,
    createNewUser,
    updateUser,
    deleteUser,
    getUser
};