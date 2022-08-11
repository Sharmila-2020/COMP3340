const mongoose = require('mongoose');
const Schema = mongoose.Schema;

//defines the User schema for the mongoDB database
const userSchema = new Schema({
    username: {
        type: String,
        required: true
    },
    password:{
        type: String,
        required: true
    },
    roles:{
        User: {
            type: Number,
            default: 2001
        },
        Admin: {
            type: Number
        }
    },
    refreshToken: String
});

module.exports = mongoose.model('User', userSchema);