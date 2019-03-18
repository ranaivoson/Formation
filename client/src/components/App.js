import React from 'react';
import {BrowserRouter, Route} from "react-router-dom";
import Login from './Login/Login';
import Register from './Register/Register';
import Header from './Header/Header';

const App = () => {
    return (
        <BrowserRouter>
            <div>
                <Header/>
                <Route path="/login" exact component={Login}/>
                <Route path="/register" exact component={Register}/>
            </div>
        </BrowserRouter>
    );
};

export default App;