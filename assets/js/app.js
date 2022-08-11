import React, {Fragment} from 'react';
import { createRoot } from 'react-dom/client';

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';
import Navbar from './components/Navbar';
import HomePage from './pages/HomePage';

const App = () => {
    return (
      <Fragment>
        <Navbar />
      </Fragment>
    )
}

const container = document.querySelector('#app');
const root = createRoot(container);
root.render(
<Fragment>
  <App/>
  <HomePage/>
</Fragment>
);

