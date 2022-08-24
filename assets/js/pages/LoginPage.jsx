import React, { useState } from 'react';

const LoginPage = () => {

    const [credentials, setCredentials] = useState({
        username: "user",
        password: "pass"
    })

    const handleChange = event => {
        const value = event.currentTarget.value;
        const name = event.currentTarget.name;
        setCredentials({...credentials, [name]: value})
    }

    return (
    <>
        <div className="py-8 px-4 mx-auto max-w-screen-xl lg:pt-16 lg:pb-8 lg:px-6">
            <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Welcome back alchemist.</h2>
            </div>
        </div>

        <div className="flex justify-center">
            <form action="" method="post" className="w-full max-w-lg">
                <div className="flex flex-wrap -mx-3 mb-6">
                    <div className="w-full px-3 mb-6 md:mb-0">
                        <p className="text-red-600 font-bold">Error message</p>
                    </div>
                </div>
                <div className="flex flex-wrap -mx-3 mb-6">
                    <div className="w-full px-3 mb-6 md:mb-0">
                        <label className="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" htmlFor="username">Email:</label>
                        <input value={credentials.username} onChange={handleChange} type="email" id="username" name="username" required className="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:bg-white focus:border-gray-500"/>
                    </div>
                </div>
                <div className="flex flex-wrap -mx-3 mb-6">
                    <div className="w-full px-3 mb-6 md:mb-0">
                        <label className="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" htmlFor="password">Password:</label>
                        <input value={credentials.password} onChange={handleChange} type="password" id="password" name="password" required className="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:bg-white focus:border-gray-500"/>
                    </div>
                </div>
                <div className="flex flex-wrap -mx-3 mb-6">
                    <div className="w-full px-3">
                        <button type="submit" className="w-full shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </>
    );
}
 
export default LoginPage;