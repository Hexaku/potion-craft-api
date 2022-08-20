import React from 'react';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'
import PotionList from '../components/Potion/PotionList';

const PotionsPage = () => {

    const queryClient = new QueryClient();
    
    return ( 
        <>
            <QueryClientProvider client={queryClient}>
                <PotionList />
            </QueryClientProvider>
        </>
    );
}
 
export default PotionsPage;