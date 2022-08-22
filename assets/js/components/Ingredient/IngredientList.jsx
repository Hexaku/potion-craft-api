import React, { useState } from 'react';
import { useQuery } from '@tanstack/react-query';
import IngredientCard from './IngredientCard';

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

    const ingredientsPerPage = 9;
    const totalPages = Math.ceil(data.length / ingredientsPerPage);

    // Creating array of pages numbers
    const pagesArray = [];
    for(let i=1; i<=totalPages; i++){
        pagesArray.push(i);
    }

    // Client pagination
    const start = currentPage * ingredientsPerPage - ingredientsPerPage;
    const paginatedIngredients = data.slice(start, start + ingredientsPerPage);
      
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
                <div className="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div className="flex-1 flex justify-between sm:hidden">
                    <a href="#" className="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
                    <a href="#" className="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
                </div>
                <div className="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">
                    <div>
                    <nav className="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <button onClick={() => setCurrentPage(currentPage - 1)} className={"relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50" + (currentPage === 1 && ' bg-gray-200 cursor-auto hover:bg-gray-200') } disabled={currentPage === 1}>
                            <span className="sr-only">Previous</span>
                            <svg className="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fillRule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clipRule="evenodd" />
                            </svg>
                        </button>
                        {pagesArray.map(page => 
                            <button key={page} onClick={() => handlePageChange(page)} className={"bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium" + (currentPage === page && ' z-10 bg-indigo-50 border-indigo-500 text-indigo-600')}>{page}</button>
                        )}
                        <button onClick={() => setCurrentPage(currentPage + 1)} className={"relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50" + (currentPage === totalPages && ' bg-gray-200 cursor-auto hover:bg-gray-200') } disabled={currentPage === totalPages}>
                            <span className="sr-only">Next</span>
                            <svg className="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd" />
                            </svg>
                        </button>
                    </nav>
                    </div>
                </div>
                </div>
            </div>
        </section>
    );
}
 
export default IngredientList;