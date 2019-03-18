import React from 'react';
import {Link} from "react-router-dom";

const Header = () => {
    return (
        <div className="navbar navbar-expand-lg navbar-dark bg-dark">
            <Link to="/" className="navbar-brand srisakdi">Formation</Link>
            <div className="collapse navbar-collapse" id="navbarSupportedContent">
                <ul className="navbar-nav mr-auto">
                    <li className="nav-item active">
                        <Link className="nav-link" to="/">Home <span className="sr-only">Login</span></Link>
                    </li>
                    <li className="nav-item">
                        <Link className="nav-link" to="/">Rechercher</Link>
                    </li>
                </ul>
                <ul className="nav navbar-nav navbar-right">
                    <li className="nav-item">
                        <Link className="nav-link" to="/login">Login</Link>
                    </li>
                    <li className="nav-item">
                        <Link className="nav-link" to="/register">Register</Link>
                    </li>
                </ul>
            </div>
        </div>
    )
};

export default Header;