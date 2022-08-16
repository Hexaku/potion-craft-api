import React from 'react';
import potionImage from '../../../images/potions/potion_bounce.jpg';


const PotionCard = ({potion}) => {

    return (
        <div className="w-full md:w-1/3 px-2 pb-12">
            <div className="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                <a href="#" className="no-underline hover:no-underline">
                <div className="flex justify-center">
                    <img src={potionImage} className="h-40 w-auto rounded-full" />
                </div>
                <div className="p-6 h-auto md:h-40">
                    <div className="flex align-items font-bold text-xl text-gray-900 mb-2">{potion.name}</div>
                    <p className="text-gray-800 font-serif text-base mb-5">
                    Une description
                    </p>
                </div>
                <div className="flex items-center flex-row inset-x-0 bottom-0 p-6">
                    <p className="text-gray-600 font-bold text-xs md:text-sm">Ingredients : </p>
                </div>
                </a>
            </div>
        </div>  
    );
}
 
export default PotionCard;