import React from 'react';
import useImage from "../hooks/useImage";
import loader from '../../images/loader.gif';

const Image = ({ fileName, alt, className, ...rest }) => {
    const { loading, error, image } = useImage(fileName)

    if (error) return <p>{alt}</p>;

    return (
        <>
            {loading ? (
                <img width="192" height="192" src={loader}></img>
            ) : (
                <img
                    className={`Image${
                        className
                            ? className.padStart(className.length + 1)
                            : ''
                    }`}
                    src={image}
                    alt={alt}
                    {...rest}
                />
            )}
        </>
    )
}

export default Image

//<img className="w-8 h-8 rounded-full mr-4" src='#' alt="Avatar of Author"/>