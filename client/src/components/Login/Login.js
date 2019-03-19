import React from 'react';
import {connect} from 'react-redux';
import {signIn} from "../../actions";
import LoginForm from './LoginForm';

class Login extends React.Component {
    onSubmit = (formValues) => {
        this.props.signIn(formValues);
    };

    render() {
        return (
            <div className="container mt-5">
                <div className="row justify-content-center text-center">
                    <div className="card col-11 col-sm-7 col-md-5">
                        <div className="card-header">
                            <h2>Se connecter</h2>
                        </div>
                        <div className="card-body">
                            <LoginForm onSubmit={this.onSubmit}/>
                        </div>
                    </div>
                </div>
            </div>
        );
    };
}

export default connect(null, {signIn})(Login);