import formation from './../apis/formation';

export const signIn = () => {
    return {
        type: 'SIGN_IN',
    }
};

export const signOut = () => {
    return {
        type: 'SIGN_OUT'
    }
}