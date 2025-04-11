import React from 'react'  
import classes from './leftnav.module.scss' 
import {  useLocation, Link } from 'react-router-dom' 



const Leftnav = () => {  

    const { pathname } = useLocation(); 

    var menu = [
        {
          link: '/',
          name: 'Главная', 
          submenu: []
        },
        {
          link: '/services',
          name: 'Услуги', 
          submenu: []
        },
        {
          link: '/portfolio',
          name: 'Наши проекты', 
          submenu: [
            /*{
                link: '/portfolio',
                name: 'Корпоративные сайты'
            },
            {
                link: '/portfolio',
                name: 'E-commerce'
            },
            {
                link: '/portfolio',
                name: 'Сервисы'
            },
            {
                link: '/portfolio',
                name: 'Промосайты'
            },
            {
                link: '/portfolio',
                name: 'Лендинги'
            },
            {
                link: '/portfolio',
                name: 'Лонгриды'
            },
            {
                link: '/portfolio',
                name: 'Медиа/СМИ'
            },
            {
                link: '/portfolio',
                name: 'Брендинг'
            },
            {
                link: '/portfolio',
                name: 'Графика'
            },*/
          ]
        },
        {
          link: '/about',
          name: 'Компания', 
          submenu: [
                {
                    link: '/about/rules',
                    name: 'Наше правило'
                },
                {
                    link: '/about/social',
                    name: 'Соцсети'
                }, 
            ]
        },
        {
          link: '/blog',
          name: 'Интересное', 
          submenu: []
        },
        {
          link: '/contacts',
          name: 'Контакты', 
          submenu: []
        },
    ];
     
    let subnav;

    return (   
        <div className={classes.nav}>
            {menu.map((el, index) => {   
                let linkClass = classes.nav__link; 
                if(pathname.indexOf(el.link) !== -1 & el.link !== "/"){
                    linkClass = classes.nav__link + " " + classes.nav__linkActive; 
                    if(el.submenu.length){
                        subnav =              
                        <div className={classes.subnav} style={{'order' : index}}>
                            {el.submenu.map((item, ind) => {  
                                return(  
                                    <Link to={item.link} className={classes.subnav__link} key={"s"+ind}>{item.name}</Link>
                                )  
                            })} 
                        </div>;
                    }
                }
                return(  
                    <Link to={el.link} className={linkClass} style={{'order' : index}} key={index}>{el.name}</Link>   
                )  
            })}
            {subnav}
        </div>   
    )
}
                    
export default Leftnav                                               

 




