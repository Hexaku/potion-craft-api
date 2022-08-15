import React from 'react';
import Tippy from '@tippyjs/react';
import Image from '../Image';

const EffectCard = ({effect}) => {

    return (
        <div className="w-full md:w-1/3 px-2 pb-12">
            <div className="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                <a href="#" className="no-underline hover:no-underline">
                <div className="flex justify-center">
                    <Image fileName={"effects/" + effect.image} className="h-40 w-auto rounded-t"/>
                </div>
                <div className="p-6 h-auto md:h-48">
                    <div className="font-bold text-xl text-gray-900">{effect.name}</div>
                </div>
                <div className="flex items-center flex-row inset-x-0 bottom-0 p-6">
                    <p className="text-gray-600 font-bold text-xs md:text-sm">Result of : </p>
                    <Tippy content="Small Potion of Acid" className="p-2 bg-gray-400 rounded text-white">
                        <img className="w-8 h-8 rounded-full mr-1" src="http://i.pravatar.cc/300" alt="Avatar of Author"/>
                    </Tippy>
                    <Tippy content="Medium Potion of Acid" className="p-2 bg-gray-400 rounded text-white">
                        <img className="w-8 h-8 rounded-full mr-1" src="http://i.pravatar.cc/300" alt="Avatar of Author"/>
                    </Tippy>                    
                    <Tippy content="Strong Potion of Acid" className="p-2 bg-gray-400 rounded text-white">
                        <img className="w-8 h-8 rounded-full mr-1" src="http://i.pravatar.cc/300" alt="Avatar of Author"/>
                    </Tippy>
                </div>
                </a>
            </div>
        </div>  
    );
}
 
export default EffectCard;