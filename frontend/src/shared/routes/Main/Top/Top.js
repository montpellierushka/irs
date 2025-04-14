import React from 'react' 
import './style.css'
import classes from './top.module.scss' 
import { Link } from 'react-router-dom'

const Top = ({title, linkHref, linkText, linkHideMobile, subtitle}) => { 
    let titleShow = "";
    if(title){
        titleShow = <h2 className={classes.top__title}>{title}</h2>;
    }
    let linkShow = "";
    if(linkHref && linkText){
        if(linkHideMobile){
            linkShow = <Link to={linkHref} className={classes.top__link+" "+classes.top__linkHide}>{linkText}</Link>;
        } else {
            linkShow = <Link to={linkHref} className={classes.top__link}>{linkText}</Link>;
        }
    }
    let subtitleShow = "";
    if(subtitle){
        subtitleShow = <div className={classes.top__subtitle}>{subtitle}</div>;
    }
    return ( 
        <div className={classes.top}>  
            <div className={classes.top__desktop}>
                {subtitleShow}
                <a href="#contacts" className={classes.top__call}>Связаться с нами</a>
            </div>
            <div className={classes.top__mobile}> 
                {titleShow}
                {linkShow}
            </div>
        </div>  
    )
}

export default Top 