import React from 'react';
import Tippy from '@tippyjs/react';
import Image from '../Image';
import potionImage from '../../../images/potion.png';

const EffectCard = ({effect}) => {

    return (
        <div className="w-full md:w-1/3 px-2 pb-12">
            <div className="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                <a href="#" className="no-underline hover:no-underline">
                <div className="flex justify-center">
                    <Image fileName={"effects/" + effect.image} className="h-40 w-auto rounded-t"/>
                </div>
                <div className="p-6 h-auto md:h-40">
                    <div className="font-bold text-xl text-gray-900 mb-2">{effect.name}</div>
                    <p className="text-gray-800 font-serif text-base mb-5">
                    {effect.description}
                    </p>
                </div>
                <div className="flex items-center flex-row inset-x-0 bottom-0 p-6">
                    <p className="text-gray-600 font-bold text-xs md:text-sm">Potions : </p>
                    {effect.potions.map((potion, index) => 
                        <Tippy key={index} content={potion.name} className="p-2 bg-gray-400 rounded text-white">
                            <img className="w-8 h-8 rounded-full ml-3" src={potionImage} alt="Avatar of Author"/>
                        </Tippy>
                    )}
                </div>
                </a>
            </div>
        </div>  
    );
}
 
export default EffectCard;