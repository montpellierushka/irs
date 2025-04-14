import React from 'react' 
import classes from './company.module.scss' 
import Social from './../Social/Social'
import Button from './../Button/Button'
import MobileHeader from './../MobileHeader/MobileHeader'
import Top from './../Top/Top'
import { Link } from 'react-router-dom'

export default function Company ({ MAIN_SLIDE4, serverData }) {    
    return ( 
        <section className={classes.section}>
            <MobileHeader />
            <Top title={MAIN_SLIDE4.title} linkHref={MAIN_SLIDE4.href} linkText={MAIN_SLIDE4.link} linkHideMobile="true" subtitle={MAIN_SLIDE4.subtitle}/> 
            <div className={classes.section__content}>
                <div className={classes.section__description} dangerouslySetInnerHTML={{ __html: MAIN_SLIDE4.text }} />
                <div className={classes.company}>                    
                    {MAIN_SLIDE4.items.map((el, i) => {
                        return (
                            <div className={classes.company__row} key={'topCompany'+i}>
                                {el.map((item, index) => {
                                    return (
                                        <div className={classes.company__element} key={i+'bottomCompany'+index}>
                                            <div className={classes.company__title} dangerouslySetInnerHTML={{ __html: item.title }} />
                                            <div className={classes.company__text} dangerouslySetInnerHTML={{ __html: item.text }} />
                                        </div>
                                    )
                                })}
                            </div>
                        )
                    })}
                </div>
                <Link to={MAIN_SLIDE4.href} className={classes.button}><span dangerouslySetInnerHTML={{ __html: MAIN_SLIDE4.link }} /></Link>
            </div> 
            <Social serverData={serverData} />
            <Button btnText={"Далее блог"} to={"#interesting"} />
        </section>   
    )
}

 