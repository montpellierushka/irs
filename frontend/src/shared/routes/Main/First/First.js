import React, { useState } from 'react' 
import {plusSlides} from './../Main'
import Button from './../Button/Button'
import Social from './../Social/Social'
import MobileHeader from './../MobileHeader/MobileHeader'
import classes from './first.module.scss'  
import FsLightbox from 'fslightbox-react'  


export default function First ({ MAIN_SLIDE1, serverData }) {   
    
    const [toggler, setToggler] = useState(false);

    return ( 
        <div className={classes.section}> 
            <MobileHeader />
            <div className={classes.top}>
                <div className={classes.top__left} dangerouslySetInnerHTML={{ __html: MAIN_SLIDE1.SLIDE1_TOP }}></div>
                <a href="#contacts" className={classes.top__right}>Связаться с нами</a>
            </div>  
            <div className={classes.bottom}>
                <div className={classes.bottom__container}>
                    <div className={classes.bottom__left}>  
                        <h1 className={classes.bottom__title} dangerouslySetInnerHTML={{ __html: MAIN_SLIDE1.SLIDE1_TITLE }}></h1>
                        <div className={classes.bottom__text} dangerouslySetInnerHTML={{ __html: MAIN_SLIDE1.SLIDE1_TEXT }}></div>
                        <a href="#contacts" className={classes.bottom__button}><span>Заказать проект</span></a>
                        <svg className={classes.bottom__svg} width="17" height="28" viewBox="0 0 17 28" fill="none" xmlns="http://www.w3.org/2000/svg" onClick={() => plusSlides()}>
                            <path d="M8.23602 0C3.69461 0 0 3.69461 0 8.23602V19.764C0 24.3054 3.69461 28 8.23602 28C12.7774 28 16.472 24.3054 16.472 19.764V8.23602C16.472 3.69461 12.7774 0 8.23602 0ZM14.7921 19.764C14.7921 23.3789 11.851 26.3201 8.23602 26.3201C4.62109 26.3201 1.67993 23.3789 1.67993 19.764V8.23602C1.67993 4.62109 4.62109 1.67993 8.23602 1.67993C11.851 1.67993 14.7921 4.62109 14.7921 8.23602V19.764Z" fill="white"/>
                            <path d="M8.23621 5.56982C7.77222 5.56982 7.39624 5.9458 7.39624 6.40979V10.2759C7.39624 10.7397 7.77222 11.1159 8.23621 11.1159C8.69998 11.1159 9.07617 10.7397 9.07617 10.2759V6.40979C9.07617 5.9458 8.7002 5.56982 8.23621 5.56982Z" fill="white"/>
                        </svg>
                    </div>
                    <div className={classes.bottom__right}>
                        <div className={classes.bottom__play} onClick={() => setToggler(!toggler)}>
                            <div className={classes.bottom__round}>
                                <svg width="24" height="40" viewBox="0 0 24 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 37.5759V2.42413C0 0.703148 2.02929 -0.214222 3.32126 0.922708L23.2938 18.4986C24.1988 19.295 24.1988 20.705 23.2938 21.5014L3.32126 39.0773C2.02929 40.2142 0 39.2968 0 37.5759Z" fill="white"/>
                                </svg>
                            </div>
                        </div>
                        <FsLightbox
                            toggler={toggler}
                            sources={[
                            MAIN_SLIDE1.SLIDE1_VIDEO, 
                            ]}
                        />
                        <div className={classes.bottom__videoName} dangerouslySetInnerHTML={{ __html: MAIN_SLIDE1.SLIDE1_VIDEO_TITLE }}></div>
                    </div>
                </div>
            </div>
            <Social serverData={serverData} />
            <Button btnText={"Далее услуги"} to={"#services"} />
        </div>  
    )
   
} 