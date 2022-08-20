import React from 'react';
import { Link } from "react-router-dom";
import Image from '../Image';

const IngredientCard = ({ingredient}) => {
    return (
        <div className="w-full md:w-1/3 px-2 pb-12">
            <div className="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                <Link to={'' + ingredient.id}>
                    <div className="flex justify-center">
                        <Image fileName={"ingredients/" + ingredient.image} className="h-48 w-auto rounded-t"/>
                    </div>
                    <div className="p-6 h-auto">
                        <p className="text-gray-600 text-xs md:text-sm">{ingredient.ingredientType.name}</p>
                        <div className="font-bold text-xl text-gray-900 mb-2">{ingredient.name}</div>
                        <p className="text-gray-800 font-serif text-base mb-5">
                        {ingredient.description}
                        </p>
                    </div>
                </Link>
            </div>
        </div>  
    );
}
 
export default IngredientCard;