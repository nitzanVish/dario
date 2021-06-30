
import axios from 'axios';

//Define basic url
const instance = axios.create({
    baseURL: 'http://localhost.api/',
});
export default instance;
