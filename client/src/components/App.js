import React from 'react';
import {BrowserRouter, Route} from "react-router-dom";
import Login from './Login';
import Register from './Register';
import Header from './Header';

const App = () => {
    return (
        <div className="container-fluid">
            <BrowserRouter>
                <div>
                    <Header/>
                    <Route path="/login" exact component={Login}/>
                    <Route path="/register" exact component={Register}/>
                </div>
            </BrowserRouter>
        </div>
    );
};

export default App;