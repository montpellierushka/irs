import React from 'react' 
import classes from './works.module.scss' 
import Social from './../Social/Social'
import Button from './../Button/Button'
import MobileHeader from './../MobileHeader/MobileHeader'
import Top from './../Top/Top'
import { Link } from 'react-router-dom'
import {reBuilder} from '../Main' 
import Env from '../../../env' 

function onHover(img){ 
    if(__isBrowser__){
        let image = document.querySelector("#worksImage")
        if(image && img){
            image.style.opacity = '0.2';
            image.style.backgroundImage = "url('"+img+"')";
        }
    }
}
function onHoverEnd(){
    if(__isBrowser__){
        let image = document.querySelector("#worksImage")
        if(image){
            image.style.opacity = '0';  
        }
    }
}

function changeCB(cb){
    if(__isBrowser__){
        document.querySelector(cb).checked = true
        reBuilder()
    }
    return false
}


export default function Works ({ MAIN_SLIDE3, serverData }) {   
    return ( 
        <section data-section='works' className={classes.section}>
            <MobileHeader />
            <Top title={MAIN_SLIDE3.title} linkHref={MAIN_SLIDE3.href} linkText={MAIN_SLIDE3.link} subtitle={MAIN_SLIDE3.subtitle}/> 
            <div className={classes.section__content}>
                <div className={classes.section__description} dangerouslySetInnerHTML={{__html: MAIN_SLIDE3.text}} />
                <div className={classes.projects}>
                    {MAIN_SLIDE3.items.map((el,index) => {   
                        return(
                            <input type="radio" name="projectsRadio" className={classes.projects__checkbox} data-tab={index} id={"projectsCB"+index} key={"cb"+index} /> 
                        )  
                    })}
                    {MAIN_SLIDE3.items.map((el, index) => {   
                        return(
                            <label className={classes.projects__label} htmlFor={"projectsCB"+index} onClick={() => changeCB("#projectsCB"+index)} data-tab={index} key={index}>{el.category}</label> 
                        )  
                    })}
                    <div className={classes.projects__items}>
                        {MAIN_SLIDE3.items.map((el, i) => { 
                            return(  
                                el.items.map((item, index) => {  
                                    let fon_image = "";
                                    let hoverSrc = "";
                                    if(item.fon_image){ 
                                        fon_image = <img src={item.fon_image} className={classes.project__fon} alt="fon" width="400" height="400" loading="lazy" />;
                                    } 
                                    let image = "";
                                    if(item.image){ 
                                        image = <img src={item.image} className={classes.project__image} alt="fon" width="400" height="400" loading="lazy" />;
                                    }  
                                    if(item.big_fon_image){
                                        hoverSrc = item.big_fon_image;
                                    } else if(item.fon_image){
                                        hoverSrc = item.fon_image; 
                                    } 
                                    return(
                                        <div data-tab={i} data-tabel={i+""+index} key={"project"+i+index} className={classes.project} onMouseEnter={() => onHover(hoverSrc)} onMouseLeave={() => onHoverEnd()}>      
                                            {fon_image} {image}                                      
                                            <Link to={item.href} className={classes.project__content}>
                                                <div className={classes.project__tags}>
                                                { 
                                                    item.tags.map((tag, ind) => {
                                                        return(
                                                            <div className={classes.project__tag} key={"tag"+i+index+ind}>{tag}</div>
                                                        )
                                                    })  
                                                }
                                                </div>
                                                <div className={classes.project__name}>{item.name}</div>
                                            </Link>
                                        </div>
                                    )  
                                })
                            )
                        })} 
                    </div>
                </div>
            </div>
            <Social serverData={serverData} />
            <Button btnText={"Далее о компании"} to={"#company"} />
        </section> 
    )
}
 