import React from 'react';
import ingredientImage from './../../images/ingredients/Blood_Ruby.png';

const HomePage = props => {
    return (
        <section className="bg-white dark:bg-gray-900">
            <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Create your own potions</h2>
                    <p className="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Potion Craft API let you craft your own potions</p>
                </div>
                <div className="container w-full max-w-6xl mx-auto px-2 py-8">
                    <div className="flex flex-wrap -mx-2">
                        <div className="w-full md:w-1/3 px-2 pb-12">
                            <div className="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                                <a href="#" className="no-underline hover:no-underline">
                                <div className="flex justify-center">
                                    <img src={ingredientImage} className="h-48 w-auto rounded-t shadow-lg"/>
                                </div>
                                <div className="p-6 h-auto md:h-48">	
                                    <p className="text-gray-600 text-xs md:text-sm">Category name</p>
                                    <div className="font-bold text-xl text-gray-900">Title name</div>
                                    <p className="text-gray-800 font-serif text-base mb-5">
                                    Synopsis
                                    </p>
                                </div>
                                <div className="flex items-center justify-between inset-x-0 bottom-0 p-6">
                                    <img className="w-8 h-8 rounded-full mr-4" src={ingredientImage} alt="Avatar of Author"/>
                                    <p className="text-gray-600 text-xs md:text-sm">date ?</p>
                                </div>
                                </a>
                            </div>
                        </div>    
                        <div className="w-full md:w-1/3 px-2 pb-12">
                            <div className="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                                <a href="#" className="no-underline hover:no-underline">
                                <img src="https://source.unsplash.com/collection/{{ key }}/400x200" className="h-48 w-full rounded-t shadow-lg"/>
                                <div className="p-6 h-auto md:h-48">	
                                    <p className="text-gray-600 text-xs md:text-sm">Category name</p>
                                    <div className="font-bold text-xl text-gray-900">Title name</div>
                                    <p className="text-gray-800 font-serif text-base mb-5">
                                    Synopsis
                                    </p>
                                </div>
                                <div className="flex items-center justify-between inset-x-0 bottom-0 p-6">
                                    <img className="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author"/>
                                    <p className="text-gray-600 text-xs md:text-sm">date ?</p>
                                </div>
                                </a>
                            </div>
                        </div>   
                        <div className="w-full md:w-1/3 px-2 pb-12">
                            <div className="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                                <a href="#" className="no-underline hover:no-underline">
                                <img src="https://source.unsplash.com/collection/{{ key }}/400x200" className="h-48 w-full rounded-t shadow-lg"/>
                                <div className="p-6 h-auto md:h-48">	
                                    <p className="text-gray-600 text-xs md:text-sm">Category name</p>
                                    <div className="font-bold text-xl text-gray-900">Title name</div>
                                    <p className="text-gray-800 font-serif text-base mb-5">
                                    Synopsis
                                    </p>
                                </div>
                                <div className="flex items-center justify-between inset-x-0 bottom-0 p-6">
                                    <img className="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author"/>
                                    <p className="text-gray-600 text-xs md:text-sm">date ?</p>
                                </div>
                                </a>
                            </div>
                        </div>   
                        <div className="w-full md:w-1/3 px-2 pb-12">
                            <div className="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                                <a href="#" className="no-underline hover:no-underline">
                                <img src="https://source.unsplash.com/collection/{{ key }}/400x200" className="h-48 w-full rounded-t shadow-lg"/>
                                <div className="p-6 h-auto md:h-48">	
                                    <p className="text-gray-600 text-xs md:text-sm">Category name</p>
                                    <div className="font-bold text-xl text-gray-900">Title name</div>
                                    <p className="text-gray-800 font-serif text-base mb-5">
                                    Synopsis
                                    </p>
                                </div>
                                <div className="flex items-center justify-between inset-x-0 bottom-0 p-6">
                                    <img className="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author"/>
                                    <p className="text-gray-600 text-xs md:text-sm">date ?</p>
                                </div>
                                </a>
                            </div>
                        </div>                   
                    </div>
                </div>
            </div>
        </section>
    );
}
 
export default HomePage;