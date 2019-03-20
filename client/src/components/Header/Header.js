import React from 'react';
import {Link} from "react-router-dom";
import {connect} from 'react-redux';
import {signOut} from "../../actions";

class Header extends React.Component {
    renderNavRightAuthentified = () => {
        return (
            <ul className="nav navbar-nav navbar-right">
                <li className="nav-item">
                    <span className="nav-link pointer" onClick={this.onSignOutClick} >Logout</span>
                </li>
            </ul>
        );
    };

    onSignOutClick = () => {
        this.props.signOut();
    };

    renderNavRight = () => {
        return (
            <ul className="nav navbar-nav navbar-right">
                <li className="nav-item">
                    <Link className="nav-link" to="/login">Login</Link>
                </li>
                <li className="nav-item">
                    <Link className="nav-link" to="/register">Register</Link>
                </li>
            </ul>
        );
    };

    render() {
        console.log(this.props.isSignedIn);
        const navRight = this.props.isSignedIn ? this.renderNavRightAuthentified() : this.renderNavRight();
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
                </div>
                {navRight}
            </div>
        )
    };
}

const mapStateToProps = (state) => {
    console.log(state);
    return {
        isSignedIn : state.auth.isSignedIn
    }
};

export default connect(mapStateToProps, {signOut})(Header);