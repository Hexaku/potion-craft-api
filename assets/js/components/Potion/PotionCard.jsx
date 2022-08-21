import React from 'react';
import { Link } from "react-router-dom";
import Image from '../Image';

const PotionCard = ({potion}) => {

    // Display one icon per key depending level of potion
    let power = [...Array(parseInt(potion.level, 10)).keys()];

    return (
        <div className="w-full md:w-1/3 px-2 pb-12">
            <div className="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                <Link to={'' + potion.id}>
                <div className="flex justify-center">
                    <Image fileName={"potions/" + potion.image} className="h-40 w-auto rounded-full"/>
                </div>
                <div className="p-6 h-auto">
                    <div className="flex align-items font-bold text-xl text-gray-900 mb-2">{potion.name}</div>
                </div>
                <div className="flex items-center flex-row inset-x-0 bottom-0 p-6">
                    <p className="text-gray-600 font-bold text-xs md:text-sm mr-2">Power : </p>
                    {power.map((level, index) => 
                        <Image keys={index} fileName={"effects/" + potion.effect.image} className="h-8 w-auto rounded-full"/>                    
                    )}
                </div>
                </Link>
            </div>
        </div>  
    );
}
 
export default PotionCard;