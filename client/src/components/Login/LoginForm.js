import React from 'react';
import {Field, reduxForm} from "redux-form";

class LoginForm extends React.Component {
    renderInput({input, label, meta}) {
        console.log(meta);
        return (
            <div className="form-group">
                <label>{ label }</label>
                <input className="form-control" {...input}/>
            </div>
        )
    }

    onSubmit(formValues){
        console.log(formValues);
    }

    render() {
        return (
            <form onSubmit={this.props.handleSubmit(this.onSubmit)} className="text-left">
                <Field name="username" component={this.renderInput} label="Username"/>
                <Field name="password" component={this.renderInput} label="Description"/>
                <button type="submit" className="btn btn-primary">Submit</button>
            </form>
        )
    }
}

const validate = (formValues) => {
    const errors = {};
    if (!formValues.username){
        errors.username = "You must enter a username";
    }
    if (!formValues.password){
        errors.password = "You must enter a password"
    }

    return errors;
};

export default reduxForm({
    form: 'auth',
    validate
})(LoginForm);
