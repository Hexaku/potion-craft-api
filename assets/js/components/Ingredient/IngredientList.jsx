import React, { useState } from 'react';
import { useQuery } from '@tanstack/react-query';
import IngredientCard from './IngredientCard';
import Pagination from '../Pagination';

const IngredientList = () => {

    const [currentPage, setCurrentPage] = useState(1);
    const [search, setSearch] = useState('');

    const { isLoading, error, data } = useQuery(['repoData'], () =>
        fetch('http://localhost:8000/api/ingredients/')
        .then(res => res.json())
        .then(data => data['hydra:member'])
    )

    const handlePageChange = page => {
        setCurrentPage(page);
    }

    const handleChange = event => {
        setSearch(event.currentTarget.value);
        setCurrentPage(1);
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

    // Client pagination
    const itemsPerPage = 6;
    const filteredIngredients = data.filter(ingredient => ingredient.name.toLowerCase().includes(search.toLowerCase()));
    const paginatedIngredients = Pagination.getData(
        filteredIngredients, 
        currentPage, 
        itemsPerPage
    );

    return ( 
        <section className="bg-white dark:bg-gray-900">
            <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Ingredients</h2>
                    <p className="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">They are used and mixed together to create potions in Potion Craft</p>
                </div>
                <div className="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">   
                    <label htmlFor="default-search" className="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div className="relative">
                        <div className="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" className="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" onChange={handleChange} value={search} id="default-search" className="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search ingredient name..." required/>
                    </div>
                </div>
                <div className="container w-full max-w-6xl mx-auto px-2 py-8">
                    <div className="flex flex-wrap -mx-2">
                        {paginatedIngredients.map((ingredient, index) => 
                            <IngredientCard ingredient={ingredient} key={index} />
                        )}
                    </div>
                </div>
                {itemsPerPage < filteredIngredients.length && (
                    <Pagination 
                        currentPage={currentPage} 
                        itemsPerPage={itemsPerPage} 
                        dataLength={filteredIngredients.length} 
                        onPageChange={handlePageChange} 
                    />
                )}
            </div>
        </section>
    );
}
 
export default IngredientList;