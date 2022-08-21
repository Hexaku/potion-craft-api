import React from 'react';
import { useQuery } from '@tanstack/react-query';
import { useParams } from 'react-router-dom';
import { Link } from "react-router-dom";
import Image from '../Image';

const PotionDescription = () => {

    const {potionId} = useParams();

    const { isLoading, error, data } = useQuery(['repoData'], () =>
        fetch(`http://localhost:8000/api/potions/${potionId}`)
        .then(res => res.json())
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

    let power = [...Array(parseInt(data.level, 10)).keys()];

    return (
        <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{data.name}</h2>
                <div className="mt-12">
                    <Image fileName={"potions/" + data.image} className="h-40 w-auto rounded-full m-auto"/>
                </div>
                <div className="bg-white shadow overflow-hidden sm:rounded-lg mt-8">
                    <div className="px-4 py-5 sm:px-6 text-left">
                        <h3 className="text-lg leading-6 font-bold text-gray-900">Potion details</h3>
                    </div>
                    <div className="border-t border-gray-200">
                        <dl>
                            <div className="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt className="text-md font-medium text-gray-500">Effect</dt>
                                <dd className="mt-1 text-md font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                                    <div className='flex items-center justify-center'>
                                        <span className='mr-2'>{data.effect.name}</span>
                                        <Image fileName={"effects/" + data.effect.image} className="h-8 w-auto rounded-full"/>                    
                                    </div>
                                </dd>
                            </div>
                            <div className="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt className="text-md font-medium text-gray-500">Effect Description</dt>
                                <dd className="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{data.effect.description}</dd>
                            </div>
                            <div className="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt className="text-md font-medium text-gray-500">Power</dt>
                                <dd className="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                                    <div className='flex justify-center items-center font-bold'>
                                        {data.level === "1" && <span className='mr-2'>Weak</span>}
                                        {data.level === "2" && <span className='mr-2'>Medium</span>}
                                        {data.level === "3" && <span className='mr-2'>Strong</span>}
                                        ({power.map((level, index) => 
                                            <Image keys={index} fileName={"effects/" + data.effect.image} className="h-8 w-auto rounded-full"/>                    
                                        )})
                                    </div>
                                </dd>
                            </div>
                            <div className="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt className="text-md font-medium text-gray-500">Ingredients needed</dt>
                                <dd className="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                                        {data.potionIngredients.map((potionIngredient, index) => 
                                            <div key={index} className="pl-3 pr-4 py-3 flex items-center justify-between text-md">
                                                <Link to={'../../ingredients/' + potionIngredient.ingredient.id}>
                                                    <div className="flex items-center">
                                                        <Image fileName={"ingredients/" + potionIngredient.ingredient.image} className="h-10 w-10 rounded-full mr-2"/>
                                                        <span className="font-bold ml-2">{potionIngredient.ingredient.name}</span>
                                                    </div>
                                                </Link>
                                                <div className="text-sm italic">
                                                    Quantity : {potionIngredient.ingredientQuantity}
                                                </div>
                                            </div>
                                        )}
                                </dd>
                            </div>
                            <div className="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt className="text-md font-medium text-gray-500">Price</dt>
                                <dd className="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">X golds</dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <Link to={'/potions'}>
                    <button class="mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-full">
                        Back to potions
                    </button>
                </Link>
            </div>
        </div>
    )
}
 
export default PotionDescription;