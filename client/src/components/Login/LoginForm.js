import React from 'react';
import {Field, reduxForm} from "redux-form";

class LoginForm extends React.Component {
    renderInput = ({input, label, type, meta}) => {
        const className = `form-control ${meta.error && meta.touched ? 'is-invalid' : ''}`;
        return (
            <div className="form-group">
                <label>{ label }</label>
                <input className={className} {...input} type={type}/>
                {this.renderError(meta)}
            </div>
        )
    };

    renderError({error, touched}){
        if (touched && error){
            return (
                <div className="invalid-feedback">{error}</div>
            );
        }
    }

    onSubmit = (formValues) => {
        this.props.onSubmit(formValues)
    };

    render() {
        return (
            <form onSubmit={this.props.handleSubmit(this.onSubmit)} className="text-left">
                <Field name="username" component={this.renderInput} label="Username" type="text"/>
                <Field name="password" component={this.renderInput} label="Password" type="password"/>
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
