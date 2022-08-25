import axios from 'axios';

function logout(){
    window.localStorage.removeItem('authToken');
    delete axios.defaults.headers["Authorization"];
}

function authenticate(credentials){
    return axios.post("http://localhost:8000/api/login_check", credentials)
        .then(response => response.data.token)
        .then(token => {
            // Stock token in local storage
            window.localStorage.setItem("authToken", token);
            // Authorization header HTTP
            axios.defaults.headers['Authorization'] = "Bearer " + token;

            return true;
        })
}

export default {
    authenticate,
    logout
}
