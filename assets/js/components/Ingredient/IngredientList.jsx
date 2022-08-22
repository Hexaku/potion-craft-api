import React, { useState } from 'react';
import { useQuery } from '@tanstack/react-query';
import IngredientCard from './IngredientCard';
import Pagination from '../Pagination';

const IngredientList = () => {

    const [currentPage, setCurrentPage] = useState(1);

    const { isLoading, error, data } = useQuery(['repoData'], () =>
        fetch('http://localhost:8000/api/ingredients/')
        .then(res => res.json())
        .then(data => data['hydra:member'])
    )

    const handlePageChange = page => {
        setCurrentPage(page);
    }

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

    const itemsPerPage = 9;

    // Client pagination
    const paginatedIngredients = Pagination.getData(data, currentPage, itemsPerPage);

    return ( 
        <section className="bg-white dark:bg-gray-900">
            <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Ingredients</h2>
                    <p className="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">They are used and mixed together to create potions in Potion Craft</p>
                </div>
                <div className="container w-full max-w-6xl mx-auto px-2 py-8">
                    <div className="flex flex-wrap -mx-2">
                        {paginatedIngredients.map((ingredient, index) => 
                            <IngredientCard ingredient={ingredient} key={index} />
                        )}
                    </div>
                </div>
                <Pagination currentPage={currentPage} itemsPerPage={itemsPerPage} dataLength={data.length} onPageChange={handlePageChange}/>
            </div>
        </section>
    );
}
 
export default IngredientList;