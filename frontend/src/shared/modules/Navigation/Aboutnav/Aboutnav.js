import React from 'react'  
import classes from './aboutnav.module.scss' 
import { useLocation, Link } from 'react-router-dom'

const Aboutnav = ({h1, menuShow = true}) => { 

    const { pathname } = useLocation(); 
    let menu = [
        {
          link: '/about',
          name: 'О нас', 
          submenu: [
            {
                link: '/about',
                name: 'Компания'
            },
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
          link: '/team',
          name: 'Люди', 
          submenu: []
        },
        {
          link: '/blog',
          name: 'Новости', 
          submenu: [
                {
                    link: '/blog/articles',
                    name: 'Статьи'
                },
                {
                    link: '/blog/news',
                    name: 'Новости'
                },
                {
                    link: '/blog/sales',
                    name: 'Акции'
                },
                {
                    link: '/blog/education',
                    name: 'Обучение'
                },
            ]
        },
        {
          link: '/vacancies',
          name: 'Вакансии', 
          submenu: []
        },
        /*{
          link: '/rewards',
          name: 'Награды', 
          submenu: []
        },*/
    ];
     
    if(pathname.startsWith('/blog')){
        menu = [ 
            {
              link: '/blog',
              name: 'Все', 
              submenu: []
            }, 
            {
              link: '/blog/articles',
              name: 'Статьи', 
              submenu: []
            }, 
            {
              link: '/blog/news',
              name: 'Новости', 
              submenu: []
            },
            {
              link: '/blog/sales',
              name: 'Акции', 
              submenu: []
            },
            {
              link: '/blog/education',
              name: 'Обучение', 
              submenu: []
            },
        ];
    }

    let subnav;
    return (  
        <> 
        <div className={classes.top}>
            <div className={classes.top__title}>{h1}</div>
            <Link to="/contacts" className={classes.top__link}>Связаться с нами</Link>
        </div>
        <h1 className={classes.title}>{h1}</h1>
        {menuShow ? (
        <div className={classes.nav}>
            {menu.map((el, index) => {   
                let linkClass = classes.nav__link; 
                if( (pathname.indexOf(el.link) !== -1 && !pathname.startsWith('/blog/page') && el.link !== '/blog') || (el.link === '/blog' && pathname === '/blog') ){
                    linkClass = classes.nav__link + " " + classes.nav__linkActive; 
                    if(el.submenu.length){
                        subnav =              
                        <div className={classes.subnav}>
                            {el.submenu.map((item, ind) => {  
                                let linkClass2 = classes.subnav__link; 
                                if(pathname === item.link){
                                    linkClass2 = classes.subnav__link + " " + classes.subnav__linkActive
                                }
                                return(  
                                    <Link to={item.link} className={linkClass2} key={"s"+ind}>{item.name}</Link>
                                )  
                            })} 
                        </div>;
                    }
                }
                return(  
                    <Link to={el.link} className={linkClass} key={index}>{el.name}</Link>   
                )  
            })}
        </div> 
        ) : (
            <br/>
        )}

        {subnav}        
        </>
    )
}
                    
export default Aboutnav                                               