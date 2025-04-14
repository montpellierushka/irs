import React from 'react'  
import classes from './button.module.scss'

const Button = ({btnText, to}) => { 
    return (  
        <a href={to} className={classes.button}>{btnText}</a>  
    )
}

export default Button