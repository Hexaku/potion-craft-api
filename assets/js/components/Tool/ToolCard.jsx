import React from 'react';
import Image from '../Image';

const ToolCard = ({tool}) => {

    return (
        <div className="w-full md:w-1/3 px-2 pb-12">
            <div className="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                <div className="flex justify-center">
                    <Image fileName={"tools/" + tool.image} className="h-40 w-auto rounded-t"/>
                </div>
                <div className="p-6 h-auto">
                    <div className="font-bold text-xl text-gray-900 mb-2">{tool.name}</div>
                    <p className="text-gray-800 font-serif text-base mb-5">
                    {tool.description}
                    </p>
                </div>
            </div>
        </div>  
    );
}
 
export default ToolCard;