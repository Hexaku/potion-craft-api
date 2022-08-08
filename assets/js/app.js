import React from 'react';
import { createRoot } from 'react-dom/client';

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

const App = () => {
    return <p className="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Potion Craft API</p>
}

const container = document.querySelector('#app');
const root = createRoot(container);
root.render(<App/>);

