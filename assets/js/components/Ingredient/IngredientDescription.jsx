import React from 'react';
import { useQuery } from '@tanstack/react-query';
import { useParams } from 'react-router-dom';
import Image from '../Image';

const IngredientDescription = () => {

    const {ingredientId} = useParams();

    const { isLoading, error, data } = useQuery(['repoData'], () =>
        fetch(`http://localhost:8000/api/ingredients/${ingredientId}`)
        .then(res => res.json())
    )

    console.log(ingredientId, data);

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
        <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{data.name}</h2>
                <div className="mt-8">
                    <Image fileName={"ingredients/" + data.image} className="h-25 w-auto rounded-full m-auto"/>
                </div>
                <div className="bg-white shadow overflow-hidden sm:rounded-lg mt-8">
                    <div className="px-4 py-5 sm:px-6 text-left">
                        <h3 className="text-lg leading-6 font-medium text-gray-900">Ingredient details</h3>
                    </div>
                    <div className="border-t border-gray-200">
                        <dl>
                            <div className="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt className="text-sm font-medium text-gray-500">Type</dt>
                                <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{data.ingredientType.name}</dd>
                            </div>
                            <div className="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt className="text-sm font-medium text-gray-500">Description</dt>
                                <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{data.description}</dd>
                            </div>
                            <div className="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt className="text-sm font-medium text-gray-500">Price</dt>
                                <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{data.price} golds</dd>
                            </div>
                            <div className="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt className="text-sm font-medium text-gray-500">Used in</dt>
                                <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <ul role="list" className="border border-gray-200 rounded-md divide-y divide-gray-200">
                                    {data.potionIngredients.map((potionIngredient, index) => 
                                        <li key={index} className="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                            <div className="w-0 flex-1 flex items-center">
                                                <Image fileName={"potions/" + potionIngredient.potion.image} className="h-10 w-auto rounded-full"/>
                                                <span className="font-bold ml-2 flex-1 w-0 truncate">{potionIngredient.potion.name}</span>
                                            </div>
                                            <div className="ml-4 flex-shrink-0">
                                                ({potionIngredient.ingredientQuantity} needed)
                                            </div>
                                        </li>
                                    )}

                                </ul>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    )
    /*
    return (
        <section className="bg-white dark:bg-gray-900">
            <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{ingredient.name}</h2>
                    <div className="mt-8">
                        <Image fileName={"ingredients/" + ingredient.image} className="h-40 w-auto rounded-full m-auto"/>
                    </div>
                </div>

            </div>
        </section>
    )*/
}
 
export default IngredientDescription;