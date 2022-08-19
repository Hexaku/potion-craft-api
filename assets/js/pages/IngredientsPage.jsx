import React from 'react';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'
import IngredientList from '../components/Ingredient/IngredientList';

const IngredientsPage = () => {

    const queryClient = new QueryClient();

    return (
        <>
            <QueryClientProvider client={queryClient}>
                <IngredientList />
            </QueryClientProvider>
        </>
    );
}
 
export default IngredientsPage;