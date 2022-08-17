import React, {useState, useEffect} from 'react';
import { useParams } from 'react-router-dom';
import axios from 'axios';
import IngredientDescription from '../components/Ingredient/IngredientDescription';


const IngredientsPage = () => {

    const [ingredient, setIngredient] = useState([]);
    const {ingredientId} = useParams();

    useEffect(() => {
        axios
            .get(`http://localhost:8000/api/ingredients/${ingredientId}`)
            .then(response => response.data)
            .then(data => setIngredient(data))
            .catch(error => console.log(error.response));
    }, [])
    
    return (
        <>
            <IngredientDescription ingredient={ingredient} />
        </>
    );
}
 
export default IngredientsPage;