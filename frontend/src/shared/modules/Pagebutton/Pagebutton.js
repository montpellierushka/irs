import React from 'react'  
import classes from './pagebutton.module.scss'
import { Link } from 'react-router-dom'

const Pagebutton = ({btnText, to}) => { 
    return (  
        <Link to={to} className={classes.button}>
            {btnText}
            <svg width="135" height="12" viewBox="0 0 135 12" fill="none" xmlns="http://www.w3.org/2000/svg" className={classes.button__svg}>
               <path d="M134.53 6.53033C134.823 6.23744 134.823 5.76256 134.53 5.46967L129.757 0.696699C129.464 0.403806 128.99 0.403806 128.697 0.696699C128.404 0.989593 128.404 1.46447 128.697 1.75736L132.939 6L128.697 10.2426C128.404 10.5355 128.404 11.0104 128.697 11.3033C128.99 11.5962 129.464 11.5962 129.757 11.3033L134.53 6.53033ZM0 6.75H134V5.25H0V6.75Z" fill="white"/>
            </svg>
        </Link>  
    )
}

export default Pagebutton