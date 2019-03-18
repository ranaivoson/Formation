import React from 'react';
import LoginForm from './LoginForm';

const Login = () => {
    return (
        <div className="container mt-5">
            <div className="row justify-content-center text-center">
                <div className="card col-11 col-sm-7 col-md-5">
                    <div className="card-header">
                        <h2>Se connecter</h2>
                    </div>
                    <div className="card-body">
                        <LoginForm/>
                    </div>
                </div>
            </div>
        </div>
    )
};

export default Login;