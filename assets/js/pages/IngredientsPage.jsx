import React, { useEffect, useState } from 'react';
import axios from 'axios';
import Image from '../components/Image';
import ingredientImage from '../../images/ingredients/Waterbloom.png';

const IngredientsPage = props => {

    const [ingredients, setIngredients] = useState([]);

    useEffect(() => {
        axios
            .get('http://localhost:8000/api/ingredients')
            .then(response => response.data['hydra:member'])
            .then(data => setIngredients(data));
    }, [])

    console.log(ingredients);

    return (
        <section className="bg-white dark:bg-gray-900">
            <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Ingredients List !</h2>
                    <p className="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Here you can see all ingredients !</p>
                </div>
                <div className="container w-full max-w-6xl mx-auto px-2 py-8">
                    <div className="flex flex-wrap -mx-2">
                        {ingredients.map((ingredient, index) => 
                            <div className="w-full md:w-1/3 px-2 pb-12">
                                <div className="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                                    <a href="#" className="no-underline hover:no-underline">
                                    <div className="flex justify-center">
                                        <Image fileName={ingredient.image} className="h-48 w-auto rounded-t"/>
                                    </div>
                                    <div className="p-6 h-auto md:h-48">	
                                        <p className="text-gray-600 text-xs md:text-sm">Herb</p>
                                        <div className="font-bold text-xl text-gray-900">{ ingredient.name }</div>
                                        <p className="text-gray-800 font-serif text-base mb-5">
                                        { ingredient.description }
                                        </p>
                                    </div>
                                    <div className="flex items-center justify-between inset-x-0 bottom-0 p-6">
                                        <img className="w-8 h-8 rounded-full mr-4" src={ingredientImage} alt="Avatar of Author"/>
                                        <p className="text-gray-600 text-xs md:text-sm">{ingredient.price} golds</p>
                                    </div>
                                    </a>
                                </div>
                            </div>   
                        )}
                    </div>
                </div>
            </div>
        </section>
    );
}
 
export default IngredientsPage;