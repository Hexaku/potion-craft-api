import React, { useEffect, useState } from 'react';
import axios from 'axios';
import ToolCard from './ToolCard';

const ToolList = () => {

    const [tools, setTools] = useState([]);

    useEffect(() => {
        axios
            .get('http://localhost:8000/api/tools')
            .then(response => response.data['hydra:member'])
            .then(data => setTools(data))
            .catch(error => console.log(error.response));
    }, [])

    return ( 
        <section className="bg-white dark:bg-gray-900">
            <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Tools List !</h2>
                    <p className="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Here you can see all tools !</p>
                </div>
                <div className="container w-full max-w-6xl mx-auto px-2 py-8">
                    <div className="flex flex-wrap -mx-2">
                        {tools.map((tool, index) => 
                            <ToolCard tool={tool} key={index} />
                        )}
                    </div>
                </div>
            </div>
        </section>
    );
}
 
export default ToolList;