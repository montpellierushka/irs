import React from 'react' 
import classes from './interesting.module.scss' 
import Social from './../Social/Social'
import Button from './../Button/Button'
import MobileHeader from './../MobileHeader/MobileHeader'
import Top from './../Top/Top'
import { Link } from 'react-router-dom'
import {reBuilder} from '../Main'


function changeCB(cb){
    if(__isBrowser__){
        document.querySelector(cb).checked = true
        reBuilder()
    }
    return false
}
export default function Interesting ({ MAIN_SLIDE5, serverData }) {   

    let tabs = [];
    let tabsLabels = [];
    let news = MAIN_SLIDE5.blog.slice(0,+MAIN_SLIDE5.count);

    return (         

        <section className={classes.section}>
            <MobileHeader />
            <Top title={MAIN_SLIDE5.title} linkHref={MAIN_SLIDE5.href} linkText={MAIN_SLIDE5.link} subtitle={MAIN_SLIDE5.subtitle}/> 
            <div className={classes.section__content}>
                <div className={classes.blog}>
                    {news.map((el,index) => {    
                        if(tabs.includes(el.category)){
                            return false;
                        } else {
                            tabs.push(el.category);
                            return(
                                <input type="radio" name="blogRadio" className={classes.blog__checkbox} data-tab={tabs.indexOf(el.category)} id={"blogCB"+index} key={"cb"+index} /> 
                            )  
                        }
                    })}
                    {news.map((el, index) => {   
                        if(tabsLabels.includes(el.category)){
                            return false;
                        } else {
                            tabsLabels.push(el.category);
                            return(
                                <label className={classes.blog__label} onClick={() => changeCB("#blogCB"+index)} htmlFor={"blogCB"+index} data-tab={tabsLabels.indexOf(el.category)} key={index}>{el.category}</label> 
                            )  
                        }
                    })}
                    <div className={classes.blog__items}>
                        {news.map((item, i) => { 
                            return(  
                                <Link to={"/blog/"+item.url} data-tab={tabsLabels.indexOf(item.category)} data-tabel={i} key={"blog"+i} className={classes.blogItem}>                   
                                    <div className={classes.blogItem__tag}>{item.category}</div>
                                    <div className={classes.blogItem__content}>
                                        <div className={classes.blogItem__name}>{item.title}</div>
                                        <div className={classes.blogItem__excerpt} dangerouslySetInnerHTML={{__html: item.excerpt}} />     
                                    </div>                                     
                                </Link>                             
                            )
                        })} 
                    </div>
                </div>
            </div>
            <Social serverData={serverData} />
            <Button btnText={"Далее контакты"} to={"#contacts"} />
        </section>   
    )
} 