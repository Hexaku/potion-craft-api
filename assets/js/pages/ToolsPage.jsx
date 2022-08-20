import React from 'react';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'
import ToolList from '../components/Tool/ToolList';

const ToolsPage = () => {

    const queryClient = new QueryClient();
    
    return ( 
        <>
            <QueryClientProvider client={queryClient}>
                <ToolList />
            </QueryClientProvider>
        </>
    );
}
 
export default ToolsPage;