import React from 'react' 
import classes from './content.module.scss' 
import Social from './../../routes/Main/Social/Social'  

function showMap(){
    if(__isBrowser__){
        if(!document.querySelector('#map__frame').getAttribute('src')){
            document.querySelector('#map__frame').setAttribute('src',document.querySelector('#map__frame').getAttribute('data-src'));
        }
        document.querySelector('#mapContainer').classList.add('show');
    } 
}

export default function Content ({ serverData }) { 

    let MAIN_SLIDE6 = __isBrowser__ ? window.__INITIAL_DATA__.MAIN_SLIDE6 : serverData.MAIN_SLIDE6 

    return (     
        <div className={classes.contacts}>
            <div className={classes.contacts__wrapper}>
                <div className={classes.contacts__left}>
                    <div className={classes.contacts__subtitle} dangerouslySetInnerHTML={{__html: MAIN_SLIDE6.clock_title}} /> 
                    <div className={classes.contacts__address} dangerouslySetInnerHTML={{__html: MAIN_SLIDE6.adress}} /> 
                    <div className={classes.contacts__time} dangerouslySetInnerHTML={{__html: MAIN_SLIDE6.clock}} /> 
                </div>
                <div className={classes.contacts__right}>
                    {MAIN_SLIDE6.phones.map((item, i) => { 
                        return(  
                            <a href={item.href} className={classes.contacts__phone} key={'phone'+i} dangerouslySetInnerHTML={{__html: item.link}} />    
                        )
                    })} 
                    <div className={classes.contacts__time} dangerouslySetInnerHTML={{__html: MAIN_SLIDE6.call}} />                       
                </div>
            </div>
            <div className={classes.contacts__description} dangerouslySetInnerHTML={{__html: MAIN_SLIDE6.description}} /> 
            <div className={classes.contacts__show} onClick={() => showMap()}>Показать на карте</div>
            <div className={classes.contacts__hr}></div>
            <Social serverData={serverData} /> 
        </div> 
    )
} 