import React, { useEffect, useState } from 'react';
import axios from 'axios';
import EffectCard from './EffectCard';

const EffectsList = () => {

    const [effects, setEffects] = useState([]);

    useEffect(() => {
        axios
            .get('http://localhost:8000/api/effects')
            .then(response => response.data['hydra:member'])
            .then(data => setEffects(data))
            .catch(error => console.log(error.response));
    }, [])

    return ( 
        <section className="bg-white dark:bg-gray-900">
            <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Effects List !</h2>
                    <p className="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Here you can see all effects !</p>
                </div>
                <div className="container w-full max-w-6xl mx-auto px-2 py-8">
                    <div className="flex flex-wrap -mx-2">
                        {effects.map((effect, index) => 
                            <EffectCard effect={effect} key={index} />
                        )}
                    </div>
                </div>
            </div>
        </section>
    );
}
 
export default EffectsList;