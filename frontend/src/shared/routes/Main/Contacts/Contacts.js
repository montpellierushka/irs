import React from 'react' 
import classes from './contacts.module.scss'  
import MobileHeader from './../MobileHeader/MobileHeader'
import Top from './../Top/Top'
import Content from './../../../modules/Map/Content'
 
export default function Contacts ({ serverData }) {  

    let MAIN_SLIDE6 = __isBrowser__ ? window.__INITIAL_DATA__.MAIN_SLIDE6 : serverData.MAIN_SLIDE6 

    return ( 
        <section className={classes.section}>
            <MobileHeader />
            <Top title={MAIN_SLIDE6.title} subtitle={MAIN_SLIDE6.subtitle}/> 
            <div className={classes.section__content}>
                <Content serverData={serverData} />
            </div>
        </section>  
    )
} 