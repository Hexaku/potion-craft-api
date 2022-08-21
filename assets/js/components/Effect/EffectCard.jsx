import React from 'react';
import Image from '../Image';

const EffectCard = ({effect}) => {

    return (
        <div className="w-full md:w-1/3 px-2 pb-12">
            <div className="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                <div className="flex justify-center">
                    <Image fileName={"effects/" + effect.image} className="h-30 w-auto rounded-t"/>
                </div>
                <div className="p-6 h-auto">
                    <div className="font-bold text-xl text-gray-900 mb-2">{effect.name}</div>
                    <p className="text-gray-800 font-serif text-base mb-5">
                    {effect.description}
                    </p>
                </div>
            </div>
        </div>  
    );
}
 
export default EffectCard;