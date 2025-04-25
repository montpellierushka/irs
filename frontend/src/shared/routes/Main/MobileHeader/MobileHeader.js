import React from 'react' 
import classes from './header.module.scss'
import {menuToggle} from './../../../modules/Menu/Menu'

const MobileHeader = () => { 
    return ( 
        <div className={classes.header}>
            <a href="#main" className={classes.header__link}>
                <img src="/logo.svg" width="164" height="41" loading="lazy" alt="logo" className={classes.header__image} />
            </a>
            <div className={classes.burger} onClick={() => menuToggle()}>
                <div className={classes.burger__line}></div>
                <div className={classes.burger__line}></div>
                <div className={classes.burger__line}></div>
            </div>
        </div>  
    )
}

export default MobileHeader