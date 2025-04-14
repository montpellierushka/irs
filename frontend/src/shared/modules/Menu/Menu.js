import React from 'react'
import { useLocation, Link } from 'react-router-dom'
import classes from './menu.module.scss' 
import './style.css' 

export const menuToggle = () =>{ 
    if(__isBrowser__){
        document.querySelector('html').classList.toggle('open-menu');
    }
}

export default function Menu ({ serverData }) { 

    let MAIN_MENU = __isBrowser__ ? window.__INITIAL_DATA__.MAIN_MENU : serverData.MAIN_MENU

    const { pathname } = useLocation();

    let toMainLink = <Link className={classes.menu__back} to="/#main" onClick={() => menuToggle()}>Вернуться на главную</Link>;
    if(pathname === '/'){
        toMainLink = <a className={classes.menu__back} href="/#main" onClick={() => menuToggle()}>Вернуться на главную</a>;
    }

    return (
        <div id="main-menu" className={classes.menu}>
            <div className={classes.menu__top}>
                <img src="/logo.svg" className={classes.menu__logo} width="140" height="35" alt="logo" />
                <div className={classes.menu__middle}>
                    {toMainLink}
                    <div className={classes.menu__title}>Меню</div>
                </div>
                <div className={classes.menu__closeWrapper}>
                    <button className={classes.menu__close} onClick={() => menuToggle()}><span className={classes.menu__closeText}>×</span></button>
                </div>
            </div>
            <nav className={classes.menu__nav}>
                <ul className={classes.menu__ul}>
                    {MAIN_MENU.map((el, index) => {    
                        return(   
                            <li className={classes.menu__li} key={index}>
                                <Link className={classes.menu__link} to={el.link} onClick={() => menuToggle()}>
                                    <span className={classes.menu__linkText}>{el.name}</span>
                                    <span className={classes.menu__linkNumber}>0{index+1}</span>
                                </Link>
                            </li>
                        )  
                    })}
                </ul>
            </nav> 
        </div>
    )
}
 