import React from 'react';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'
import EffectList from '../components/Effect/EffectList';

const EffectsPage = () => {

    const queryClient = new QueryClient();
    
    return ( 
        <>
            <QueryClientProvider client={queryClient}>
                <EffectList />
            </QueryClientProvider>
        </>
    );
}
 
export default EffectsPage;