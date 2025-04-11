import React from 'react' 
import classes from './map.module.scss'  
import Content from './Content' 
import Container from './Container' 
import {menuToggle} from './../Menu/Menu' 
import { Link } from 'react-router-dom'

var mapScroll = 0;
function wheel(e){
    if(__isBrowser__){
        var map = document.querySelector("#map");
        if(map){
            if(e.deltaY > 0){
                mapScroll += 5; 
            } else if(e.deltaY < 0) {
                mapScroll -= 5;
            }
            if(mapScroll < 0){
                mapScroll = 5;
            } else if(mapScroll > 100){
                mapScroll = 100;
            }
            map.style.clipPath = 'circle('+mapScroll+'% at center)';
        } 
    }
} 

export default function Map ({ fetchInitialData=false,serverData }) {

    let MAIN_SLIDE6 = __isBrowser__ ? window.__INITIAL_DATA__.MAIN_SLIDE6 : serverData.MAIN_SLIDE6 

    return (     
           <div className={classes.contacts} onWheel = {(e) => wheel(e)}>

                <Container serverData={serverData} />

                <div className={classes.map}>
                    <div className={classes.map__left}>
                        <Link to="/#main" className={classes.map__logo}>
                            <img src="/logo.svg" className={classes.map__logoImage} width="140" height="35" alt="logo" />
                        </Link>
                    </div>
                    <div className={classes.map__content}>
                        <div className={classes.map__subtitle} dangerouslySetInnerHTML={{__html: MAIN_SLIDE6.subtitle}} /> 
                        <div className={classes.map__hr}></div>
                        <div className={classes.map__title} dangerouslySetInnerHTML={{__html: MAIN_SLIDE6.title}} /> 
                        <Content serverData={serverData} />
                    </div>
                    <div className={classes.map__right}>
                        <div className={classes.burger} onClick={() => menuToggle()}>
                            <div className={classes.burger__line}></div>
                            <div className={classes.burger__line}></div>
                            <div className={classes.burger__line}></div>
                        </div>
                    </div>
                </div>
        
        </div> 
    )
} 