import React from 'react';
import { createRoot } from 'react-dom/client';
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

const App = () => {
    return <h1>Hello boys !!!!</h1>
}

const container = document.querySelector('#app');
const root = createRoot(container);
root.render(<App />);
