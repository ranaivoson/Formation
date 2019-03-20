import React from 'react';
import {Router, Route} from "react-router-dom";
import {connect} from 'react-redux'
import history from "../history";
import Login from './Login/Login';
import Register from './Register/Register';
import Header from './Header/Header';
import Home from './Home';
import {isSignedIn} from "../actions";

const App = (props) => {
    props.isSignedIn(localStorage.getItem('jwt'));
    return (
        <Router history={history}>
            <div>
                <Header/>
                <Route path="/" exact component={Home}/>
                <Route path="/login" exact component={Login}/>
                <Route path="/register" exact component={Register}/>
            </div>
        </Router>
    );
};

export default connect(null, {isSignedIn})(App);