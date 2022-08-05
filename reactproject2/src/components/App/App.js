import React, { useEffect, useState } from 'react';
import './App.css';
import './styles.css';

import Login from '../Login/Login';
import Register from '../Register/Register';
import Home from '../WebPages/Home';
import Equipment from '../WebPages/Equipment';
import Template from '../WebPages/Template';
import FanClothing from '../WebPages/FanClothing';
import About from '../WebPages/About';
import Footwear from '../WebPages/Footwear';
import OnSale from '../WebPages/OnSale';
import Clothing from '../WebPages/Clothing';
import Profile from '../WebPages/Profile';

import { BrowserRouter, Route, Routes } from 'react-router-dom';
import useToken from './useToken';



function App() {
    const { token, setToken } = useToken();

    useEffect(() => {
        console.log(token);
    }, [token]);
    /*
    if (!token) {
        return <Login setToken={setToken} />
    }
    */
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Template />} >
                    <Route index element={<Home />} />
                    <Route path="/Register" element={<Register />} />
                    <Route path="/Login" element={<Login setToken={setToken} />} />
                    <Route path="/Equipment" element={<Equipment />} />
                    <Route path="/FanClothing" element={<FanClothing />} />
                    <Route path="/About" element={<About />} />
                    <Route path="/Footwear" element={<Footwear />} />
                    <Route path="/OnSale" element={<OnSale />} />
                    <Route path="/Clothing" element={<Clothing />} />
                    <Route path="/Profile" element={<Profile />} />
                </Route>
            </Routes>
        </BrowserRouter>
    );
}

export default App;
