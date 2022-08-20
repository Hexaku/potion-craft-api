import React from 'react';
import { useQuery } from '@tanstack/react-query';
import EffectCard from './EffectCard';

const EffectList = () => {

    const { isLoading, error, data } = useQuery(['repoData'], () =>
        fetch('http://localhost:8000/api/effects/')
        .then(res => res.json())
        .then(data => data['hydra:member'])
    )

    if (isLoading) return (
        <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Loading...</h2>
            </div>
        </div>
    )

    if (error) return (
        <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <p className="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">{'An error has occurred: ' + error.message}</p>
            </div>
        </div>
    )

    return ( 
        <section className="bg-white dark:bg-gray-900">
            <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Effects</h2>
                    <p className="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">They are used to imbue potions in Potion Craft</p>
                </div>
                <div className="container w-full max-w-6xl mx-auto px-2 py-8">
                    <div className="flex flex-wrap -mx-2">
                        {data.map((effect, index) => 
                            <EffectCard effect={effect} key={index} />
                        )}
                    </div>
                </div>
            </div>
        </section>
    );
}
 
export default EffectList;