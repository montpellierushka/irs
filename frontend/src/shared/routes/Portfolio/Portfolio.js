import React from 'react' 
import classes from './portfolio.module.scss'
import { useLocation, Link } from 'react-router-dom'
import {menuToggle} from './../../modules/Menu/Menu'   
import Pagebutton from './../../modules/Pagebutton/Pagebutton'  
import Map from './../../modules/Map/Map'
import Form from './../../modules/Page/Form/Form'  
import Leftnav from './../../modules/Navigation/Leftnav/Leftnav'  

const viewToggle = () =>{ 
    if(__isBrowser__){
        document.querySelector('body').classList.toggle('view-rows');
    }
}

export default function Portfolio ({ fetchInitialData, serverData }) {    

    const { pathname } = useLocation(); 
    if(pathname === "/portfolio"){ 

        return (
            <>
                <div className={'page-wrapper'}>
                    <div className={'page-left'}>
                        <div className="sticky-wrapper">
                            <Link to="/#main" className={'page-logo'}>
                                <img src="/logo.svg" className={'page-logoImage'} width="140" height="35" alt="logo" />
                            </Link>
                            <Leftnav />
                        </div>
                    </div>
                    <div className={'page-content'}>
                        
                        <div className={classes.breadcrumbs}>
                            <div className={classes.breadcrumbs__wrapper}>
                                <Link className={classes.breadcrumbs__link} to="/#main">Главная</Link><span className={classes.breadcrumbs__separator}> / </span><span className={classes.breadcrumbs__current}>Наши проекты</span>
                            </div>
                            <Link to="/contacts" className={classes.breadcrumbs__contacts}>Связаться с нами</Link>
                        </div>
                        <div className={classes.title}>
                            <h1 className="page-title">Наши проекты</h1>
                            <div className={classes.view} onClick={() => viewToggle()}>
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="0.647461" width="18.3529" height="6.11765" fill="white"/>
                                    <rect y="12.8828" width="18.3529" height="6.11765" fill="white"/>
                                </svg>
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.646484" y="0.647461" width="6.11765" height="6.11765" fill="#76CCF8"/>
                                    <rect x="0.646484" y="12.8828" width="6.11765" height="6.11765" fill="#76CCF8"/>
                                    <rect x="12.8818" y="0.647461" width="6.11765" height="6.11765" fill="#76CCF8"/>
                                    <rect x="12.8818" y="12.8828" width="6.11765" height="6.11765" fill="#76CCF8"/>
                                </svg>
                            </div>
                        </div>
                        <div className="page-description">Проектируем и разрабатываем корпоративные сайты, интернет-магазины и посадочные страницы. Оказываем комплексные услуги продвижения и рекламы сайта</div>

                        <div className={classes.projects}>
                            <div className={classes.projects__element}>
                                <div className={classes.projects__rowContent}>
                                    <Link to="/portfolio/krep" className={classes.projects__rowTitle}>Снаб Креп НСК</Link>
                                    <div className={classes.projects__rowDescription}>Сайт производителя<br /> крепежа</div>
                                    <div className={classes.projects__rowTags}>
                                        <div className={classes.projects__rowTag}>Лендинг</div>
                                        <div className={classes.projects__rowTag}>Фирменый стиль</div>
                                    </div>
                                </div>
                                <div className={classes.projects__linkWraper}>
                                    <Link to="/portfolio/krep" className={classes.projects__link}>
                                        <img src="/img/projects/project1.jpg" width="550" height="400" loading="lazy" alt="project" className={classes.projects__image} />
                                        <div className={classes.projects__linkContent}>
                                            <div className={classes.projects__title}>Снаб Креп НСК</div>
                                            <div className={classes.projects__description}>Сайт производителя<br /> крепежа</div>
                                        </div>
                                    </Link>
                                </div>
                            </div>
                            <div className={classes.projects__back} style={{'backgroundImage':'url(/img/projects/project1.jpg)'}}></div>
                            {/*<div className={classes.projects__element}>
                                <div className={classes.projects__rowContent}>
                                    <Link to="/portfolio/krep" className={classes.projects__rowTitle}>Экскалибур</Link>
                                    <div className={classes.projects__rowDescription}>Сайт производителя<br /> крепежа</div>
                                    <div className={classes.projects__rowTags}>
                                        <div className={classes.projects__rowTag}>Лендинг</div>
                                        <div className={classes.projects__rowTag}>Фирменый стиль</div>
                                    </div>
                                </div>
                                <div className={classes.projects__linkWraper}>
                                    <Link to="/portfolio/krep" className={classes.projects__link}>
                                        <img src="/img/projects/project2.jpg" width="550" height="400" loading="lazy" alt="project" className={classes.projects__image} />
                                        <div className={classes.projects__linkContent}>
                                            <div className={classes.projects__title}>Экскалибур</div>
                                            <div className={classes.projects__description}>Сайт производителя<br /> крепежа</div>
                                        </div>
                                    </Link>
                                </div>
                            </div>
                            <div className={classes.projects__back} style={{'backgroundImage':'url(/img/projects/project2.jpg)'}}></div>*/}
                        </div>

                    </div>
                    <div className={'page-right'}>
                        <div className={'page-burger'} onClick={() => menuToggle()}>
                            <div className={'page-burger__line'}></div>
                            <div className={'page-burger__line'}></div>
                            <div className={'page-burger__line'}></div>
                        </div>

                        <Form />
                    </div>
                </div>

                <Pagebutton btnText={"Хочу работать с вами"} to={"/contacts"} />

                <Map serverData={serverData} />
         
            </>
        )
    } else {
        let content
        let css
        switch (pathname) {
            case '/portfolio/krep':
                css =  `
                    html{
                        background-color: #fff;
                    }
                    [class="page-burger__line"] {
                        background: #161616;
                    } 
                    [class="page-wrapper"] {
                        position: relative;
                        background: #F5F5F7;
                    } 
                    [class="page-content"] {
                        position: relative;
                        color: #161616;
                    } 
                    `;
 

                content = 
                <>
                    <div className={'page-wrapper'}>
                        <div className={'page-left'}>
                            <div className="sticky-wrapper">
                                <Link to="/#main" className={'page-logo'}>
                                    <img src="/img/logo_dark.svg" className={'page-logoImage'} width="140" height="35" alt="logo" />
                                </Link> 
                            </div>
                        </div>
                        <div className={'page-content'}>
                            
                            <div className={classes.breadcrumbs +" "+ classes.breadcrumbsLight}>
                                <div className={classes.breadcrumbs__wrapper}>
                                    <Link className={classes.breadcrumbs__link} to="/#main">Главная</Link>
                                    <span className={classes.breadcrumbs__separator}> / </span>
                                    <Link className={classes.breadcrumbs__link} to="/portfolio">Наши проекты</Link>
                                    <span className={classes.breadcrumbs__separator}> / </span>
                                    <span className={classes.breadcrumbs__current}>Снаб Креп НСК</span>
                                </div>
                                <Link to="/contacts" className={classes.breadcrumbs__contacts}>Связаться с нами</Link>
                            </div>

                            <div className={classes.krepFirst}>
                                <div className={classes.krepFirst__left}>Разработка сайта для производителя крепежа</div>
                                <div className={classes.krepFirst__right}>
                                    <a href="http://krepsnab.ru/" target="_blank" rel="noreferrer" className={classes.krepFirst__link}>krepsnab.ru</a>
                                </div>
                            </div>

                            <div className={classes.krepSecond}>
                                <div className={classes.krepSecond__left}><span>Снаб</span> Креп НСК</div>
                                <div className={classes.krepSecond__right}>
                                    <div className={classes.krepSecond__comp}>/ компетенции</div>
                                    <div className={classes.krepSecond__el}>Концептуальный дизайн</div>
                                    <div className={classes.krepSecond__el}>Технический дизайн</div>
                                    <div className={classes.krepSecond__el}>Frontend-разработка</div>
                                    <div className={classes.krepSecond__el}>Backend-разработка</div>
                                    <div className={classes.krepSecond__el}>SEO</div>
                                </div>
                            </div>
                            
                            <img src="/img/projects/krep/img1.png" alt="img" width="1082" height="600" loading="lazy" className={classes.krepImg1} />
                            <img src="/img/projects/krep/img2.png" alt="img" width="428" height="795" loading="lazy" className={classes.krepImg2} />

                        </div>
                        <div className={'page-right'}>
                            <div className={'page-burger'} onClick={() => menuToggle()}>
                                <div className={'page-burger__line'}></div>
                                <div className={'page-burger__line'}></div>
                                <div className={'page-burger__line'}></div>
                            </div> 
                        </div>
                    </div>

                    <div className={classes.krepThird}>
                        <div className={classes.krepThird__title}>/ задача</div>
                        <div className={classes.krepThird__text}>Разработать функциональный сайт, который подчеркнет всю серьезность компании Снаб Креп НСК</div>
                    </div>

                    <img src="/img/projects/krep/img3.png" alt="img" width="1920" height="657" loading="lazy" className={classes.krepImg3} />

                    <div className={'page-content'}>
                            
                        <div className={classes.krepFour}>
                            <div className={classes.krepFour__title}>ГЛАВНАЯ</div>
                            <div className={classes.krepFour__text}>Разработать функциональный сайт, который подчеркнет всю серьезность компании Снаб Креп НСК </div>
                        </div>

                        <img src="/img/projects/krep/img4.png" alt="img" width="1082" height="600" loading="lazy" className={classes.krepImg4} />

                        <div className={classes.krepText}>Наша команда занимается созданием и продвижением сайтов, внедрением CRM, разработкой приложений, игр и обучением, а также трудоустраивает лучших учеников. Наш девиз «Градус понижать нельзя».</div>
    
                        <div className={classes.krepFour}>
                            <div className={classes.krepFour__title}>КАЛЬКУЛЯТОР</div>
                            <div className={classes.krepFour__text}>Разработать функциональный сайт, который подчеркнет всю серьезность компании Снаб Креп НСК </div>
                        </div>

                        <img src="/img/projects/krep/img5.png" alt="img" width="1082" height="235" loading="lazy" className={classes.krepImg4} />
    
                        <div className={classes.krepFour}>
                            <div className={classes.krepFour__title}>АДАПТИВНАЯ ВЕРСИЯ</div>
                            <div className={classes.krepFour__text}>Разработать функциональный сайт, который подчеркнет всю серьезность компании Снаб Креп НСК </div>
                        </div>

                        <img src="/img/projects/krep/img6.png" alt="img" width="1082" height="492" loading="lazy" className={classes.krepImg6} />

                        <div className={classes.krepFive}>
                            <div className={classes.krepFive__title}>/ отзыв клиента</div>
                            <div className={classes.krepFive__text}>Разработать функциональный сайт, который подчеркнет всю серьезность компании Снаб Креп НСК </div>
                        </div>

                    </div>

                    <div className={'page-wrapper'}>
                        <img src="/img/projects/krep/img7.png" alt="img" width="878" height="903" loading="lazy" className={classes.krepImg7} />
                        <div className={'page-content'}>
                            <div className={classes.otherProjectsTitle}>Другие проекты</div>
                            <div className={classes.projects} data-projects="krep">
                                <div className={classes.projects__element}>
                                    <div className={classes.projects__rowContent}>
                                        <Link to="/portfolio/krep" className={classes.projects__rowTitle}>Снаб Креп НСК</Link>
                                        <div className={classes.projects__rowDescription}>Сайт производителя<br /> крепежа</div>
                                        <div className={classes.projects__rowTags}>
                                            <div className={classes.projects__rowTag}>Лендинг</div>
                                            <div className={classes.projects__rowTag}>Фирменый стиль</div>
                                        </div>
                                    </div>
                                    <div className={classes.projects__linkWraper}>
                                        <Link to="/portfolio/krep" className={classes.projects__link}>
                                            <img src="/img/projects/project1.jpg" width="550" height="400" loading="lazy" alt="project" className={classes.projects__image} />
                                            <div className={classes.projects__linkContent}>
                                                <div className={classes.projects__title}>Снаб Креп НСК</div>
                                                <div className={classes.projects__description}>Сайт производителя<br /> крепежа</div>
                                            </div>
                                        </Link>
                                    </div>
                                </div> 
                                {/*<div className={classes.projects__element}>
                                    <div className={classes.projects__rowContent}>
                                        <Link to="/portfolio/krep" className={classes.projects__rowTitle}>Экскалибур</Link>
                                        <div className={classes.projects__rowDescription}>Сайт производителя<br /> крепежа</div>
                                        <div className={classes.projects__rowTags}>
                                            <div className={classes.projects__rowTag}>Лендинг</div>
                                            <div className={classes.projects__rowTag}>Фирменый стиль</div>
                                        </div>
                                    </div>
                                    <div className={classes.projects__linkWraper}>
                                        <Link to="/portfolio/krep" className={classes.projects__link}>
                                            <img src="/img/projects/project2.jpg" width="550" height="400" loading="lazy" alt="project" className={classes.projects__image} />
                                            <div className={classes.projects__linkContent}>
                                                <div className={classes.projects__title}>Экскалибур</div>
                                                <div className={classes.projects__description}>Сайт производителя<br /> крепежа</div>
                                            </div>
                                        </Link>
                                    </div>
                                </div> */}
                                 
                            </div>
                        </div>
                    </div>                        

                    <Pagebutton btnText={"Расскажите о вашем проекте"} to={"/contacts"} />

                    <Map serverData={serverData} />
                </>
                break;
            default:    
                content = <></>
                break;
        }
        return (
            <><style>{css}</style>{content}</>
        )
    } 
} 