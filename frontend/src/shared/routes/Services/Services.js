import React from 'react'
//import ContextData from '../../context/Data/ContextData'
import classes from './services.module.scss'
import { useLocation, Link } from 'react-router-dom'
import {menuToggle} from './../../modules/Menu/Menu'   
import Pagebutton from './../../modules/Pagebutton/Pagebutton'  
import Map from './../../modules/Map/Map'


import {Helmet} from "react-helmet";



export default function Services ({ fetchInitialData, serverData }) {
    const { pathname } = useLocation();
    //const {stateData} = React.useContext(ContextData)
    //const news = stateData.news 
    if(pathname === '/services'){
        return (
            <>
            <Helmet>       
              <meta name="description" content="★ Индивидуальный подход к бизнесу ★" />
              <title>Услуги. Студия разработки ИРС</title>
            </Helmet> 

            <div className={classes.first}>
                <div className={classes.first__left}>
                    <Link to="/#main" className={classes.first__logo}>
                        <img src="/logo.svg" className={classes.first__logoImage} width="140" height="35" alt="logo" />
                    </Link>
                </div>
                <div className={classes.first__content}>
                    <div className={classes.breadcrumbs}>
                        <div className={classes.breadcrumbs__wrapper}>
                            <Link className={classes.breadcrumbs__link} to="/#main">Главная</Link><span className={classes.breadcrumbs__separator}> / </span><span className={classes.breadcrumbs__current}>Услуги</span>
                        </div>
                        <Link to="/contacts" className={classes.breadcrumbs__contacts}>Связаться с нами</Link>
                    </div>
                    <h1 className="page-title">Услуги</h1>
                    <div className="page-description">Проектируем и разрабатываем корпоративные сайты, интернет-магазины и посадочные страницы. Оказываем комплексные услуги продвижения и рекламы сайта</div>
                    <div className={classes.columns}>
                        <div className={classes.columns__column}>
                            <div className={classes.columns__title}>Разработка</div>
                            <Link to="/services/mark" className={classes.columns__link}>Проекты любой сложности на 1С-Битрикс,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>Сайты на платформе Tilda Publishing.</Link>
                            <div className={classes.columns__title}>Автоматизация</div>
                            <Link to="/services/marketing" className={classes.columns__link}>Интеграция портала Битрикс24,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>техподдержка корпоративных порталов,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>внедрение CRM,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>подключение IP-телефонии,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>интеграция сайта с 1С.</Link>
                        </div>
                        <div className={classes.columns__column}>
                            <div className={classes.columns__title}>Маркетинг</div>
                            <Link to="/services/marketing" className={classes.columns__link}>Поисковая оптимизация,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>контекстная реклама,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>rtb-реклама,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>стратегия,</Link> 
                            <Link to="/services/marketing" className={classes.columns__link}>аналитика,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>контент-маркетинг,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>SMM,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>управление репутацией.</Link>
                            <div className={classes.columns__title}>Поддержка</div>
                            <Link to="/services/marketing" className={classes.columns__link}>Обеспечение бесперебойной работы сайта,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>исправление программных ошибок,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>обновление информации,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>внедрение нового функционала.</Link>
                        </div>
                        <div className={classes.columns__column}>
                            <div className={classes.columns__title}>Дизайн</div>
                            <Link to="/services/marketing" className={classes.columns__link}>Брендинг,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>веб-дизайн,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>разработка фирменного стиля,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>создание удобных интерфейсов,</Link>
                            <Link to="/services/marketing" className={classes.columns__link}>дизайн продукта.</Link>
                        </div>
                    </div>
                </div>
                <div className={classes.first__right}>
                    <div className={classes.burger} onClick={() => menuToggle()}>
                        <div className={classes.burger__line}></div>
                        <div className={classes.burger__line}></div>
                        <div className={classes.burger__line}></div>
                    </div>
                </div>
            </div>
            <Pagebutton btnText={"Реализованные проекты"} to={"/portfolio"} />
            <div className={classes.process}>
                <div className={classes.process__title}>Процесс</div>
                <div className={classes.process__wrapper}>
                    <div className={classes.process__element}>
                        <svg className={classes.process__svg} width="71" height="211" viewBox="0 0 71 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.1" d="M44.9824 0.941406H70.4707V211H37.5117V52.0645H0.0117188V29.5059C12.6094 28.1387 22.1797 25.1602 28.7227 20.5703C35.3633 15.8828 40.7832 9.33984 44.9824 0.941406Z" fill="url(#paint0_linear_425_1237)"/>
                            <defs>
                                <linearGradient id="paint0_linear_425_1237" x1="48.5" y1="-77" x2="48.5" y2="231" gradientUnits="userSpaceOnUse">
                                    <stop stopColor="white"/>
                                    <stop offset="1" stopColor="white" stopOpacity="0"/>
                                </linearGradient>
                            </defs>
                        </svg>
                        <div className={classes.process__elementText}>Аналитика и сбор данных.<br /> Постановка KPI.</div>
                    </div>
                    <div className={classes.process__element}>
                        <svg className={classes.process__svg} width="140" height="213" viewBox="0 0 140 213" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.1" d="M139.465 213H0.0117188C0.0117188 200.012 1.96484 188.244 5.87109 177.697C9.77734 167.053 14.8555 158.215 21.1055 151.184C27.4531 144.152 34.3867 137.707 41.9062 131.848C49.5234 125.988 57.0918 120.666 64.6113 115.881C72.1309 110.998 79.0156 106.213 85.2656 101.525C91.6133 96.8379 96.7402 91.3691 100.646 85.1191C104.553 78.7715 106.506 71.8867 106.506 64.4648C106.506 53.8203 103.186 45.4219 96.5449 39.2695C90.002 33.1172 80.8223 30.041 69.0059 30.041C63.2441 30.041 57.8242 31.1152 52.7461 33.2637C47.7656 35.3145 43.8594 37.8047 41.0273 40.7344C38.293 43.5664 35.8516 46.4473 33.7031 49.377C31.6523 52.3066 30.2363 54.8457 29.4551 56.9941L28.4297 60.0703L1.47656 48.0586C1.86719 46.6914 2.4043 44.9336 3.08789 42.7852C3.86914 40.6367 5.91992 36.8281 9.24023 31.3594C12.6582 25.8906 16.6133 21.0566 21.1055 16.8574C25.5977 12.6582 32.0918 8.80078 40.5879 5.28516C49.084 1.76953 58.5566 0.0117188 69.0059 0.0117188C89.6113 0.0117188 106.506 6.21289 119.689 18.6152C132.873 31.0176 139.465 46.3008 139.465 64.4648C139.465 74.0352 137.512 82.9219 133.605 91.125C129.699 99.3281 124.719 106.213 118.664 111.779C112.707 117.248 105.822 122.912 98.0098 128.771C90.2949 134.533 82.7754 139.807 75.4512 144.592C68.127 149.377 60.9004 155.139 53.7715 161.877C46.7402 168.518 41.3203 175.549 37.5117 182.971H139.465V213Z" fill="url(#paint0_linear_425_1238)"/>
                            <defs>
                                <linearGradient id="paint0_linear_425_1238" x1="71" y1="-75" x2="71" y2="233" gradientUnits="userSpaceOnUse">
                                <stop stopColor="white"/>
                                <stop offset="1" stopColor="white" stopOpacity="0"/>
                            </linearGradient>
                            </defs>
                        </svg>
                        <div className={classes.process__elementText}>Разработка и реализация стратегии digital-коммуникации</div>
                    </div>
                    <div className={classes.process__element}>
                        <svg className={classes.process__svg} width="151" height="216" viewBox="0 0 151 216" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.1" d="M112.506 101.965C113.482 102.355 114.801 102.941 116.461 103.723C118.219 104.406 121.246 106.164 125.543 108.996C129.84 111.73 133.648 114.904 136.969 118.518C140.289 122.131 143.268 127.16 145.904 133.605C148.639 139.953 150.006 146.936 150.006 154.553C150.006 171.74 143.121 186.291 129.352 198.205C115.68 210.021 97.5645 215.93 75.0059 215.93C65.4355 215.93 56.3535 214.807 47.7598 212.561C39.166 210.217 32.0371 207.482 26.373 204.357C20.8066 201.135 15.9727 197.912 11.8711 194.689C7.76953 191.467 4.79102 188.781 2.93555 186.633L0.00585938 182.971L20.9531 162.023C21.3438 162.609 22.0273 163.488 23.0039 164.66C24.0781 165.734 26.3242 167.688 29.7422 170.52C33.1602 173.254 36.7246 175.695 40.4355 177.844C44.2441 179.895 49.2246 181.799 55.377 183.557C61.627 185.217 68.1699 186.047 75.0059 186.047C87.9941 186.047 98.248 182.922 105.768 176.672C113.287 170.324 117.047 162.463 117.047 153.088C117.047 143.615 113.287 135.754 105.768 129.504C98.248 123.156 87.9941 119.982 75.0059 119.982H54.0586V89.9531H75.0059C85.3574 89.9531 93.4141 87.2676 99.1758 81.8965C105.035 76.5254 107.965 69.25 107.965 60.0703C107.965 50.793 105.035 43.4688 99.1758 38.0977C93.4141 32.7266 85.3574 30.041 75.0059 30.041C66.2168 30.041 57.916 31.9453 50.1035 35.7539C42.291 39.5625 36.7734 43.2246 33.5508 46.7402L28.5703 52.4531L7.47656 31.5059C8.0625 30.7246 8.94141 29.6504 10.1133 28.2832C11.3828 26.8184 14.1172 24.2305 18.3164 20.5195C22.5156 16.8086 27.0078 13.6348 31.793 10.998C36.5781 8.26367 42.877 5.77344 50.6895 3.52734C58.502 1.18359 66.6074 0.0117188 75.0059 0.0117188C95.6113 0.0117188 111.773 5.33398 123.492 15.9785C135.211 26.5254 141.07 40.1973 141.07 56.9941C141.07 62.7559 140.045 68.3223 137.994 73.6934C136.041 78.9668 133.648 83.2637 130.816 86.584C127.984 89.9043 125.201 92.7852 122.467 95.2266C119.83 97.5703 117.486 99.2305 115.436 100.207L112.506 101.965Z" fill="url(#paint0_linear_425_1239)"/>
                            <defs>
                                <linearGradient id="paint0_linear_425_1239" x1="77" y1="-75" x2="77" y2="233" gradientUnits="userSpaceOnUse">
                                    <stop stopColor="white"/>
                                    <stop offset="1" stopColor="white" stopOpacity="0"/>
                                </linearGradient>
                            </defs>
                        </svg>
                        <div className={classes.process__elementText}>Подведение итогов и дальнейшее развитие</div>
                    </div>
                </div>
            </div>
            <Pagebutton btnText={"Расскажите о вашем проекте"} to={"#"} />

            <Map serverData={serverData} />
         
            </>
        )
    } else {
        let content
        switch (pathname) {
          case '/services/marketing':
                content = <>                
                    <div className={'page-wrapper'}>
                        <div className={'page-left'}>
                            <Link to="/#main" className={'page-logo'}>
                                <img src="/logo.svg" className={'page-logoImage'} width="140" height="35" alt="logo" />
                            </Link>
                        </div>
                        <div className={'page-content'}>
                            <div className={classes.breadcrumbs}>
                                <div className={classes.breadcrumbs__wrapper}>
                                    <Link className={classes.breadcrumbs__link} to="/#main">Главная</Link><span className={classes.breadcrumbs__separator}> / </span>
                                    <Link className={classes.breadcrumbs__link} to="/services">Услуги</Link><span className={classes.breadcrumbs__separator}> / </span><span className={classes.breadcrumbs__current}>Маркетинг</span>
                                </div>
                                <Link to="/contacts" className={classes.breadcrumbs__contacts}>Связаться с нами</Link>
                            </div>

                            <div className={classes.marketingTitleWrapper}>
                                <h1 className={classes.marketingTitle}>Маркетинг</h1>
                                <div className={classes.marketingDescription}>Оказываем комплексные услуги продвижения и рекламы сайта</div>
                            </div>

                            <div className={classes.marketing}>
                                <div className={classes.marketing__element}>
                                    <div className={classes.marketing__title}>Поисковая оптимизация</div>
                                    <div className={classes.marketing__text}>Увеличиваем трафик из поисковой выдачи, повышаем конверсии, снижаем затраты на привлечение клиентов.</div>
                                </div>
                                <div className={classes.marketing__element}>
                                    <div className={classes.marketing__title}>Контекстная реклама</div>
                                    <div className={classes.marketing__text}>Приводим на сайт целевых клиентов и возвращаем тех, кто однажды его покинул</div>
                                </div>
                                <div className={classes.marketing__element}>
                                    <div className={classes.marketing__title}>RTB-реклама</div>
                                    <div className={classes.marketing__text}>Создаем и ведем успешные кампании. Вашу рекламу будут видеть только целевые пользователи.</div>
                                </div>
                                <div className={classes.marketing__element}>
                                    <div className={classes.marketing__title}>Стратегия</div>
                                    <div className={classes.marketing__text}>Увеличиваем трафик из поисковой выдачи, повышаем конверсии, снижаем затраты на привлечение клиентов.</div>
                                </div>
                                <div className={classes.marketing__element}>
                                    <div className={classes.marketing__title}>Аналитика</div>
                                    <div className={classes.marketing__text}>Приводим на сайт целевых клиентов и возвращаем тех, кто однажды его покинул</div>
                                </div>
                                <div className={classes.marketing__element}>
                                    <div className={classes.marketing__title}>Контент-маркетинг</div>
                                    <div className={classes.marketing__text}>Создаем и ведем успешные кампании. Вашу рекламу будут видеть только целевые пользователи.</div>
                                </div>
                                <div className={classes.marketing__element}>
                                    <div className={classes.marketing__title}>SMM</div>
                                    <div className={classes.marketing__text}>Увеличиваем трафик из поисковой выдачи, повышаем конверсии, снижаем затраты на привлечение клиентов.</div>
                                </div>
                                <div className={classes.marketing__element}>
                                    <div className={classes.marketing__title}>Управление репутацией</div>
                                    <div className={classes.marketing__text}>Приводим на сайт целевых клиентов и возвращаем тех, кто однажды его покинул</div>
                                </div>
                            </div>

                        </div>
                        <div className={'page-right'}>
                            <div className={'page-burger'} onClick={() => menuToggle()}>
                                <div className={'page-burger__line'}></div>
                                <div className={'page-burger__line'}></div>
                                <div className={'page-burger__line'}></div>
                            </div>
                        </div>
                    </div>

                    <Pagebutton btnText={"Расскажите о вашем проекте"} to={"/contacts"} />

                    <Map serverData={serverData} />
                </>    
            break;
          default:         
            content = <>
                    <div className={'page-wrapper'}>
                        <div className={'page-left'}>
                            <Link to="/#main" className={'page-logo'}>
                                <img src="/logo.svg" className={'page-logoImage'} width="140" height="35" alt="logo" />
                            </Link>
                        </div>
                        <div className={'page-content'}>
                            <div className={classes.breadcrumbs}>
                                <div className={classes.breadcrumbs__wrapper}>
                                    <Link className={classes.breadcrumbs__link} to="/#main">Главная</Link><span className={classes.breadcrumbs__separator}> / </span>
                                    <Link className={classes.breadcrumbs__link} to="/services">Услуги</Link><span className={classes.breadcrumbs__separator}> / </span><span className={classes.breadcrumbs__current}>Маркетинг</span>
                                </div>
                                <Link to="/contacts" className={classes.breadcrumbs__contacts}>Связаться с нами</Link>
                            </div>

                            <div className={classes.marketingTitleWrapper2}>
                                <h1 className={classes.marketingTitle2}>Маркетинг</h1>
                                <div className={classes.marketingDescription2}>Проектируем и разрабатываем корпоративные сайты, интернет-магазины и посадочные страницы. Оказываем комплексные услуги продвижения и рекламы сайта</div>
                            </div>

                            <div className={classes.marketing2}>
                                <div className={classes.marketing2__element}>
                                    <div className={classes.marketing2__squere}></div>
                                    <div className={classes.marketing2__text}>Вашу рекламу видят только заинтересованные пользователи</div>
                                </div>
                                <div className={classes.marketing2__element}>
                                    <div className={classes.marketing2__squere}></div>
                                    <div className={classes.marketing2__text}>Вы платите за переходы на сайт, а не за показ объявлений</div>
                                </div>
                                <div className={classes.marketing2__element}>
                                    <div className={classes.marketing2__squere}></div>
                                    <div className={classes.marketing2__text}>Коммерческий эффект можно оценить в реальном времени</div>
                                </div>
                            </div>


                        </div>
                        <div className={'page-right'}>
                            <div className={'page-burger'} onClick={() => menuToggle()}>
                                <div className={'page-burger__line'}></div>
                                <div className={'page-burger__line'}></div>
                                <div className={'page-burger__line'}></div>
                            </div>
                        </div>
                    </div>
                </>    
            break;
        }
        return (
            <>{content}</>
        )
    }
} 