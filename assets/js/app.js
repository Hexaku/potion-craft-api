import React, {Fragment, useState} from 'react';
import { createRoot } from 'react-dom/client';
import AuthAPI from './services/authAPI';
import Navbar from './components/Navbar';
import HomePage from './pages/HomePage';
import IngredientsPage from './pages/IngredientsPage';
import IngredientPage from './pages/IngredientPage';
import PotionPage from './pages/PotionPage';
import PotionsPage from './pages/PotionsPage';
import EffectsPage from './pages/EffectsPage';
import ToolsPage from './pages/ToolsPage';
import LoginPage from './pages/LoginPage';
import RegisterPage from './pages/RegisterPage';
import { HashRouter as Router, Routes, Route } from "react-router-dom";
import '../css/app.css';

AuthAPI.setup();

const App = () => {

    const [isAuthenticated, setIsAuthenticated] = useState(AuthAPI.isAuthenticated());

    return (
      <Router>
        <Navbar isAuthenticated={isAuthenticated} onLogout={setIsAuthenticated} />
        <Routes>
          <Route path='/ingredients/:ingredientId' element={<IngredientPage />} />
          <Route path='/ingredients' element={<IngredientsPage />} />
          <Route path='/potions/:potionId' element={<PotionPage />} />
          <Route path='/potions' element={<PotionsPage />} />
          <Route path='/effects' element={<EffectsPage />} />
          <Route path='/tools' element={<ToolsPage />} />
          <Route path='/login' element={<LoginPage onLogin={setIsAuthenticated} />} />
          <Route path='/register' element={<RegisterPage />} />
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

