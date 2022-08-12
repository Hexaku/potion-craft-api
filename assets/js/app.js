import React, {Fragment} from 'react';
import { createRoot } from 'react-dom/client';
import Navbar from './components/Navbar';
import HomePage from './pages/HomePage';
import IngredientsPage from './pages/IngredientsPage';
import { HashRouter as Router, Routes, Route } from "react-router-dom";
import '../css/app.css';


const App = () => {
    return (
      <Router>
        <Navbar/>
        <Routes>
          <Route path='/ingredients' element={<IngredientsPage />} />
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

