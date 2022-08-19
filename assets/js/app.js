import React, {Fragment} from 'react';
import { createRoot } from 'react-dom/client';

import Navbar from './components/Navbar';
import HomePage from './pages/HomePage';
import IngredientsPage from './pages/IngredientsPage';
import IngredientPage from './pages/IngredientPage';
import PotionsPage from './pages/PotionsPage';
import EffectsPage from './pages/EffectsPage';
import ToolsPage from './pages/ToolsPage';
import { HashRouter as Router, Routes, Route } from "react-router-dom";
import '../css/app.css';

const App = () => {
    return (
      <Router>
        <Navbar/>
        <Routes>
          <Route path='/ingredients/:ingredientId' element={<IngredientPage />} />
          <Route path='/ingredients' element={<IngredientsPage />} />
          <Route path='/potions' element={<PotionsPage />} />
          <Route path='/effects' element={<EffectsPage />} />
          <Route path='/tools' element={<ToolsPage />} />
          <Route path='/' element={<HomePage/>} />
        </Routes>
      </Router>
    )
}

const container = document.querySelector('#app');
const root = createRoot(container);
root.render(
<Fragment>
  <App/>
</Fragment>
);

