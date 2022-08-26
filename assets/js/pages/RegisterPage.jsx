import axios from 'axios';
import React, { useState } from 'react';

const RegisterPage = () => {

    const [user, setUser] = useState({
        username: "",
        email: "",
        password: ""
    })

    // Input change
    const handleChange = ({currentTarget}) => {
        const {value, name} = currentTarget;
        setUser({...user, [name]: value})
    }

    const handleSubmit = async event => {
        event.preventDefault();
        try {
            const response = await axios.post("http://localhost:8000/api/users", user);
            console.log(response);
        } catch(error) {
            console.log(error.response);
        }
        console.log("submit!");
    }

    return ( 
    <>
        <div className="py-8 px-4 mx-auto max-w-screen-xl lg:pt-16 lg:pb-8 lg:px-6">
            <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Wanna be an alchemist ?</h2>
            </div>
        </div>

        <div className="flex justify-center">
            <form onSubmit={handleSubmit} className="w-full max-w-lg">
                {true &&
                <div className="flex flex-wrap -mx-3 mb-6">
                    <div className="w-full px-3 mb-6 md:mb-0">
                        <p className="text-red-600 font-bold">Error ?</p>
                    </div>
                </div>}
                <div className="flex flex-wrap -mx-3 mb-6">
                    <div className="w-full px-3 mb-6 md:mb-0">
                        <label className="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" htmlFor="username">Username:</label>
                        <input value={user.username} onChange={handleChange} id="username" name="username" required className="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:bg-white focus:border-gray-500"/>
                    </div>
                </div>
                <div className="flex flex-wrap -mx-3 mb-6">
                    <div className="w-full px-3 mb-6 md:mb-0">
                        <label className="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" htmlFor="email">Email:</label>
                        <input value={user.email} onChange={handleChange} type="email" id="email" name="email" required className="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:bg-white focus:border-gray-500"/>
                    </div>
                </div>
                <div className="flex flex-wrap -mx-3 mb-6">
                    <div className="w-full px-3 mb-6 md:mb-0">
                        <label className="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" htmlFor="password">Password:</label>
                        <input value={user.password} onChange={handleChange} type="password" id="password" name="password" required className="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:bg-white focus:border-gray-500"/>
                    </div>
                </div>
                <div className="flex flex-wrap -mx-3 mb-6">
                    <div className="w-full px-3">
                        <button type="submit" className="w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </>
    );
}
 
export default RegisterPage;