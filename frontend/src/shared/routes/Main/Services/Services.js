import React from 'react'  
import classes from './services.module.scss' 
import Social from './../Social/Social'
import Button from './../Button/Button'
import MobileHeader from './../MobileHeader/MobileHeader'
import Top from './../Top/Top' 
import { Link } from 'react-router-dom'  

const scrollBlock = (e) => { 
    let direction = e.target.getAttribute('data-direction'); 
    var myDivs = e.target.parentNode.querySelectorAll("div[data-div='props']");
    for (var m = 0; m < myDivs.length; m++) {
        var attribute = Number(myDivs[m].getAttribute('data-transform'));
        if(direction === 'up'){
            attribute += Number(100);
        } else {
            attribute -= Number(100);
        } 
        if( (direction === 'up' && attribute<=0) || (direction === 'down' && (attribute >= -(myDivs.length - 4)*100)) ){
            myDivs[m].setAttribute('data-transform', attribute);
            myDivs[m].style.transform = 'translateY('+attribute+'%)';
        }
    }
}

export default function Services ({ MAIN_SLIDE2, serverData }) { 
    
    return ( 
        <section className={classes.section}>
            <MobileHeader />
            <Top title={MAIN_SLIDE2.SLIDE2_TITLE} linkHref={MAIN_SLIDE2.SLIDE2_HREF} linkText={MAIN_SLIDE2.SLIDE2_LINK} subtitle={MAIN_SLIDE2.SLIDE2_SUBTITLE}/> 
            <div className={classes.section__content}>
                <div className={classes.section__description} dangerouslySetInnerHTML={{__html: MAIN_SLIDE2.SLIDE2_TEXT}} />
                <div className={classes.services}>
                    {MAIN_SLIDE2.SLIDE2_ITEMS.map((el, index) => {  
                        let up = "";
                        let down = ""; 
                        if(el.props.length > 4){
                            up = <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 7L6 2L11 7" stroke="#C2C2C2" strokeWidth="2"/>
                                </svg>;
                            down =  <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L6 6L11 1" stroke="#C2C2C2" strokeWidth="2"/>
                                    </svg>;
                        }
                        return ( 
                            <div key={index} className={classes.service}> 
                                <img src={"/img/main/service1.jpg"} className={classes.service__img} alt="service" width="345" height="680" loading="lazy" />
                                <div className={classes.service__name}>{el.name}</div>
                                <div className={classes.service__desc}>{el.excerpt}</div>
                                <div className={classes.service__up} data-direction="up" onClick={scrollBlock}>{up}</div>
                                <div className={classes.service__props}>
                                    {el.props.map((element, key) => {
                                        return (
                                            <div className={classes.service__propWrapper} key={key} data-div="props" data-transform="0">
                                                <div className={classes.service__prop}>
                                                    <div className={classes.service__propPlus}>+</div>
                                                    <div className={classes.service__propText} dangerouslySetInnerHTML={{__html: element}} />
                                                </div>
                                            </div>
                                        )
                                    })}
                                </div>
                                <div className={classes.service__down} data-direction="down" onClick={scrollBlock}>{down}</div>
                                <div className={classes.service__wrapper}>
                                    <div className={classes.service__price}>
                                        <div className={classes.service__priceLeft}>Цена:</div>
                                        <div className={classes.service__priceRight}>{el.price}</div>
                                    </div>
                                    <Link to={el.detail} className={classes.service__link}><span>Подробнее</span></Link>
                                </div>
                            </div>
                        )  
                    })}
                </div>
            </div>
            <Social serverData={serverData} />
            <Button btnText={"Далее наши проекты"} to={"#works"} />
        </section>  
    )
}
