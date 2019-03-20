import React from 'react';
import {Router, Route} from "react-router-dom";
import history from "../history";
import Login from './Login/Login';
import Register from './Register/Register';
import Header from './Header/Header';

const App = () => {
    return (
        <Router history={history}>
            <div>
                <Header/>
                <Route path="/login" exact component={Login}/>
                <Route path="/register" exact component={Register}/>
            </div>
        </Router>
    );
};

export default App;