import formation from '../apis/formation'
import history from '../history';

import {
    SIGN_IN,
    SIGN_OUT,
} from "./types";

export const signIn = formValues => async dispatch => {
    const response = await formation.post('/login', formValues);

    dispatch({
        type: SIGN_IN,
        payload: response.data.token
    });

    history.push('/');
};


export const signOut = () => {
    return {
        type: SIGN_OUT
    }
};