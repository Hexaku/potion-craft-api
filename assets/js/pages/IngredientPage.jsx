import React from 'react';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'
import IngredientDescription from '../components/Ingredient/IngredientDescription';


const IngredientPage = () => {

    const queryClient = new QueryClient();

    return (
        <>
            <QueryClientProvider client={queryClient}>
                <IngredientDescription />
            </QueryClientProvider>
        </>
    );
}
 
export default IngredientPage;