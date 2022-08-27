import React from 'react';
import { Link } from 'react-router-dom';
import potionGif from '../../images/potion_craft.gif';
import authAPI from '../services/authAPI';

const HomePage = ({isAuthenticated}) => {
    return (
        <section className="dark:bg-gray-900">
            <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    {(!isAuthenticated ?
                    <>
                        <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Welcome on Potion Craft API</h2>
                        <p className="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Check our resources and create your own potions !</p>
                    </>
                    :
                    <>
                        <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Welcome back {authAPI.getUsername()} !</h2>
                        <p className="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Which potion will you create today alchemist ?</p>
                    </>
                    )}
                </div>
                {(isAuthenticated ?
                    <div className='flex justify-center'>
                        <button className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-full float-right">
                                Create new potion
                        </button>
                    </div>
                : 
                    <div className='flex justify-center'>
                        <p className="text-xl text-green-500">Please <Link to="login" className="font-bold hover:underline">login</Link> or <Link to="register" className="font-bold hover:underline">register</Link> to start creating your own potions !</p>
                    </div>
                )}
                <div className='pt-16 flex justify-center'>
                    <img src={potionGif} />
                </div>
            </div>
        </section>
    );
}
 
export default HomePage;