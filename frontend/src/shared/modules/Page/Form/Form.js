import React, { useState, useEffect } from 'react'  
import classes from './form.module.scss' 
import Env from '../../../env'
import { useLocation } from 'react-router-dom'; 

import axios from 'axios';   

function handleSubmit(e) {
    
    let elems = e.target.children;
    let email = false;
    for(let i = 0; i<elems.length; i++){
        if(e.target.children[i].type === 'email'){
            email = e.target.children[i].value;
        }
    }
    e.target.innerHTML = '<div class="'+classes.form__title+'">Спасибо за Вашу заявку! Наши менеджеры свяжутся с Вами в ближайшее время.</div>';

    if(email){
        axios.get(Env.backend+'order', {
            params: { 
                email: email, 
            }
        }).then(function(response){                                       
            //console.log(response)                            
        });
    }
   
    e.preventDefault();
}

const Form = ({toggleVisible}) => { 
    const [isVisible, setIsVisible] = useState(false);

    useEffect(() => {
        const handleScroll = () => {
            if (toggleVisible) {
                const triggerElement = document.getElementById(toggleVisible);
                if (triggerElement) {
                    const rect = triggerElement.getBoundingClientRect();     
                    const hasPassedTrigger = rect.top <= 200;
                    
                    setIsVisible(hasPassedTrigger);
                }
            } else {
                setIsVisible(true);
            }
        };
        handleScroll();
        window.addEventListener('scroll', handleScroll);
        
        return () => {
            window.removeEventListener('scroll', handleScroll);
        };
    }, [toggleVisible]);
    
    const formVisibilityClass = isVisible ? classes.visibleForm : classes.hiddenForm;
    
    return (  
        <div className={`${classes.sideForm} ${formVisibilityClass}`}>
            <img src="/img/form.png" className={classes.form__image} alt="form" width="192" height="283" />
            <form className={classes.form} onSubmit={(e) => handleSubmit(e)}>
                <div className={classes.form__title}>Получите коммерческое предложение уже через 30 секунд</div>
                <input type="email" className={classes.form__input} required={true} placeholder="Ваш E-mail"/>
                <button type="submit" className={classes.form__submit}><span>Получить предложение</span></button>
                <div className={classes.form__checkbox}>
                    <input type="checkbox" required={true} />
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="13" height="13" rx="3" fill="#0C0C0D"/>
                        <path fillRule="evenodd" clipRule="evenodd" d="M9.75 4.96262L6.71188 8.14824L5.69918 9.2102L4.68647 8.14824L4.69209 8.14235L3.25 6.61379L4.26297 5.55183L5.7048 7.08065L8.73729 3.90039L9.75 4.96262Z" fill="#0C0C0D"/>
                    </svg>
                    <div>Вы даете согласие на обработку персональных данных и соглашаетесь с политикой конфиденциальности</div>
                </div>
            </form>
        </div> 
    )
}

export default Form