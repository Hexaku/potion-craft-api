import React from 'react';
import Image from '../components/Image';

const IngredientCard = ({ingredient}) => {

    return (    
        <div className="w-full md:w-1/3 px-2 pb-12">
            <div className="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                <a href="#" className="no-underline hover:no-underline">
                <div className="flex justify-center">
                    <Image fileName={ingredient.image} className="h-48 w-auto rounded-t"/>
                </div>
                <div className="p-6 h-auto md:h-48">	
                    <p className="text-gray-600 text-xs md:text-sm">Type of ingredient</p>
                    <div className="font-bold text-xl text-gray-900">{ingredient.name}</div>
                    <p className="text-gray-800 font-serif text-base mb-5">
                    {ingredient.description}
                    </p>
                </div>
                <div className="flex items-center justify-between inset-x-0 bottom-0 p-6">
                    <img className="w-8 h-8 rounded-full mr-4" src="#"/>
                    <p className="text-gray-600 text-xs md:text-sm">{ingredient.price} golds</p>
                </div>
                </a>
            </div>
        </div>  
    );
}
 
export default IngredientCard;