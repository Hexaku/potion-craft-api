import React from 'react';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'
import PotionDescription from '../components/Potion/PotionDescription';


const PotionPage = () => {

    const queryClient = new QueryClient();

    return (
        <>
            <QueryClientProvider client={queryClient}>
                <PotionDescription />
            </QueryClientProvider>
        </>
    );
}
 
export default PotionPage;