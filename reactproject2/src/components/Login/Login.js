import React, { useState } from 'react';
import './Login.css';
import PropTypes from 'prop-types';
import { Link, Navigate } from 'react-router-dom';


async function loginUser(credentials) {
    return fetch('http://localhost:8080/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(credentials)
    })
        .then(data => data.json())
}

export default function Login({ setToken }) {

    const [username, setUserName] = useState();
    const [password, setPassword] = useState();

    const [success, setSuccess] = useState(false);

    const handleSubmit = async e => {
        e.preventDefault();
        const token = await loginUser({
            username,
            password
        });
        setToken(token);

        console.log(username);
        console.log(password);

        localStorage.setItem('user', username);
        setSuccess(true);
    }

    return (
        <>
            {success ? (
                <section style={{ margin: '10%', display: 'flex', textAlign: 'center', flexDirection: 'column' }}>
                    <h1>Success!</h1>
                    <p>
                        <Link to="/" className="line"> Go to home </Link>
                    </p>
                </section>
            ) : (
                <div className="login-wrapper" style={{ marginBottom: '10%', marginTop: '10%' }}>

            <h1 id="login-title">Log In</h1>
            <form onSubmit={handleSubmit}>
                <label>
                    <p id="username-label">Username</p>
                    <input type="text" onChange={e => setUserName(e.target.value)} />
                </label>
                <label>
                    <p id="password-label">Password</p>
                    <input type="password" onChange={e => setPassword(e.target.value)} />
                </label>
                <br/>
                <div>
                    <button type="submit">Submit</button>
                </div>
            </form>

            <p>
                Need an account? <br />
                <span className="line">
                    <Link to="/Register">Click to Register.</Link>
                </span>
            </p>
        </div>
        )}
    </>
    )
}
Login.propTypes = {
    setToken: PropTypes.func.isRequired
}