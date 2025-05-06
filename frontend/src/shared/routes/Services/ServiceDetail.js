import React from 'react';
import { Link, useLocation } from 'react-router-dom'
import ContextData from '../../context/Data/ContextData';
import classes from './services.module.scss';
import ShowMore from './ShowMore';
import TrustSlider from './TrustSlider';
import ProjectSlider from './ProjectSlider';
import Loading from './../../modules/Loading/Loading'
import Map from './../../modules/Map/Map'
import Form from './../../modules/Page/Form/Form' 

export default function ServiceDetail({ fetchInitialData, serverData }) {
    const { pathname } = useLocation();

    const {stateData, dispatchData} = React.useContext(ContextData) 

    const [content, setContent] = React.useState(() => { 
        return __isBrowser__
          ? ((window.__INITIAL_PATH__ === pathname) ? window.__INITIAL_DATA__.pageBackendContent : (stateData.servicesDetailContext[pathname]) ? stateData.servicesDetailContext[pathname] : false)
          : serverData.pageBackendContent
    })

    if ( !(stateData.servicesDetailContext[pathname]) && __isBrowser__ ) {
        if(window.__INITIAL_PATH__ === pathname){  
            stateData.servicesDetailContext[pathname] = window.__INITIAL_DATA__.pageBackendContent; 
            stateData.contextSEO[pathname] = window.__INITIAL_DATA__.backendSEO;
            dispatchData({
              type: "FETCH_SERVICES_DETAIL",
              payload: stateData.servicesDetailContext
            })
        }
    } 

    const [loading, setLoading] = React.useState(
        content ? false : true
    )

    const fetchNewContent = React.useRef(
        content ? false : true
    ) 

    React.useEffect(() => {
      if (fetchNewContent.current === true) {
        if(stateData.servicesDetailContext[pathname]){
          setContent(stateData.servicesDetailContext[pathname])         
        } else {
          setLoading(true)
          fetchInitialData(false, pathname)
            .then((response) => {
              setContent(response.pageBackendContent)
              setLoading(false) 
              stateData.servicesDetailContext[pathname] = response.pageBackendContent;
              stateData.contextSEO[pathname] = response.backendSEO;
              dispatchData({
                  type: "FETCH_SERVICES_DETAIL",
                  payload: stateData.servicesDetailContext
              }) 
            })
        }
      } else {
        fetchNewContent.current = true
      }
    }, [fetchNewContent,stateData, dispatchData, pathname])

    console.log(content);
    return (
    <> 
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
                        <Link className={classes.breadcrumbs__link} to="/services">Услуги</Link><span className={classes.breadcrumbs__separator}> / </span><span className={classes.breadcrumbs__current}>{content.title}</span>
                    </div>
                    <Link to="/contacts" className={classes.breadcrumbs__contacts}>Связаться с нами</Link>
                </div>
                {loading ? (
                    <Loading />
                ) : (
                <div className={classes.serviceDetail}>
                    <div className={classes.servicePageTop}>
                        <div className={classes.servicePageTop__left}>
                            <h1 className={classes.servicePageTop__title}>{content.title}</h1>
                            <div className={classes.servicePageTop__text}>{content.description}</div>
                            {content.content && (
                                <div className={classes.servicePageTop__gifts}>
                                    {content.content.gifts.map((gift, i) => (
                                        <div key={i}>
                                            <img src="/img/services/gift.svg"/>
                                            <span>{gift.title}</span>
                                        </div>
                                    ))}
                                </div>
                            )}
                        </div>
                        <div className={classes.servicePageTop__right}>
                            <div>
                                <form className={classes.serviceForm} onSubmit={(e) => handleSubmit(e)}>
                                    <div className={classes.serviceForm__header}>
                                        <h3>Привлечь новых клиентов</h3>
                                        <p>с помощью интернет-магазина</p>
                                    </div>
                                    <input type="text" className={classes.serviceForm__input} required={true} placeholder="Имя*"/>
                                    <input type="tel" className={classes.serviceForm__input} required={true} placeholder="Телефон*"/>
                                    <button type="submit" className={classes.serviceForm__submit}><span>Отправить</span></button>
                                    <div className={classes.serviceForm__checkbox}>
                                        <input type="checkbox" required={true} />
                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="13" height="13" rx="3" fill="#0C0C0D"/>
                                            <path fillRule="evenodd" clipRule="evenodd" d="M9.75 4.96262L6.71188 8.14824L5.69918 9.2102L4.68647 8.14824L4.69209 8.14235L3.25 6.61379L4.26297 5.55183L5.7048 7.08065L8.73729 3.90039L9.75 4.96262Z" fill="#0C0C0D"/>
                                        </svg>
                                        <div>Вы даете согласие на обработку персональных данных и соглашаетесь с политикой конфиденциальности</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {content.content && (
                    <div className={classes.servicePageWhy}>
                        <h2>Зачем вам {content.content.whys.titleBlock}?</h2>
                        <div className={classes.servicePageWhy__list}>
                            {content.content.whys.items.map((why, i) => (
                            <div key={i} className={classes.servicePageWhy__item}>
                                <span></span>
                                {why.title}
                            </div>
                            ))}
                        </div>
                    </div>
                    )}
                    {content.content && (
                    <div className={classes.servicePageHelp} id="visibleForm">
                        <h2>У вас крутой продукт, о котором мало кто знает?<br/> <span>Мы поможем!</span></h2>
                        <div className={classes.servicePageHelp_list}>
                            {content.content.helps.map((help, i) => (
                            <div key={i} className={classes.servicePageHelp_item}>
                                <div className={classes.servicePageHelp_item_digit}>{help.digit}</div>
                                <span className={classes.servicePageHelp_item_subtitle}>{help.subtitle}</span>
                                <p className={classes.servicePageHelp_item_text}>{help.text}</p>
                            </div>
                            ))}
                        </div>
                    </div>
                    )}
                    {content.content && (
                    <div className={classes.servicePageWork}>
                        <h2>Над вашим {content.content.works.titleBlock} работают</h2>
                        <div className={classes.servicePageWork__list}>
                            {content.content.works.items.map((work, i) => (
                            <div key={i} className={classes.servicePageWork__item}>
                                <h3>{work.title}</h3>
                                <p>{work.text}</p>
                            </div>
                            ))}
                        </div>
                    </div>
                    )}
                    {content.content && (
                    <div className={classes.servicePageStart}>
                        <div className={classes.servicePageStart__left}>
                            <img src={content.content.starts.img}/>
                        </div>
                        <div className={classes.servicePageStart__right}>
                            <h2>{content.content.starts.title}</h2>
                            <p>{content.content.starts.text}</p>
                        </div>
                    </div>
                    )}
                    {content.content && (
                    <div className={classes.servicePageWhyWe}>
                        <h2>Почему стоит обратиться к нам?</h2>
                        <div className={classes.servicePageWhyWe_list}>
                            {content.content.whywes.map((whywe, i) => (
                            <div key={i} className={classes.servicePageWhyWe_item}>
                                <span></span>
                                {whywe.title}
                            </div>
                            ))}
                        </div>
                    </div>
                    )}
                    {content.content && (
                    <div className={classes.servicePageGoal}>
                        <div className={classes.servicePageGoal_left}>
                            <img src={content.content.goals.img}/>
                        </div>
                        <div className={classes.servicePageGoal_right}>
                            <h2><span>Наша цель - </span>{content.content.goals.title}</h2>
                            <p>{content.content.goals.text}</p>
                        </div>
                    </div>
                    )}
                    {content.content && (
                    <div className={classes.servicePageTrust}>
                        <div className={classes.servicePageTrust__title}>
                            <h2>Нам доверились</h2>
                            <div className={`servicePageTrust__nav`}>
                                <div className={`swiper-button-prev`}>
                                    <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.4453 1.11133L1.55642 10.0002L10.4453 18.8891" stroke="white" stroke-width="2"/>
                                    </svg>
                                </div>
                                <div className={`swiper-button-next`}>
                                    <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.55469 1.11133L10.4436 10.0002L1.55469 18.8891" stroke="white" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div className={classes.servicePageTrust__slider}>
                            <TrustSlider trusts={content.content.trusts}/>
                        </div>
                    </div>
                    )}
                    {content.content && (
                    <div className={classes.servicePageProjects}>
                        <div className={classes.servicePageProjects__title}>
                            <h2>Наши проекты</h2>
                            <div className={`servicePageProjects__nav`}>
                                <div className={`swiper-button-prev`}>
                                    <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.4453 1.11133L1.55642 10.0002L10.4453 18.8891" stroke="white" stroke-width="2"/>
                                    </svg>
                                </div>
                                <div className={`swiper-button-next`}>
                                    <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.55469 1.11133L10.4436 10.0002L1.55469 18.8891" stroke="white" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div className={classes.servicePageProjects__slider}>
                            <ProjectSlider projects={content.content.projects} />
                        </div>
                    </div>
                    )}
                    {content.content && (
                    <div className={classes.servicePageChoose}>
                        <h2>Выбирая нас, вы получаете</h2>
                        <div className={classes.servicePageChoose_list}>
                            {content.content.chooses.map((choose, i) => (
                            <div className={classes.servicePageChoose_item}>
                                <p className={classes.servicePageChoose_item_text}>{choose.title}</p>
                            </div>
                            ))}
                        </div>
                    </div>
                    )}
                    {content.content && (
                    <div className={classes.servicePageTask}>
                        <div className={classes.servicePageTask__text}>
                            <h2>Расскажите<br/> о своей задаче</h2>
                            <p>Разработка качественного интернет-магазина имеет множество нюансов и особенностей, зависит от отрасли вашего бизнеса и конкурентности в ней. Хотите получить консультацию и узнать, сколько будет стоить интернет-магазин для вашего бизнеса?</p>
                        </div>
                        <div className={classes.servicePageTask__form}>
                            <form onSubmit={(e) => handleSubmit(e)}>
                                <div className={classes.servicePageTask__form__inputs}>
                                    <input type="text" className={classes.servicePageTask__form__input} required={true} placeholder="Имя*"/>
                                    <input type="tel" className={classes.servicePageTask__form__input} required={true} placeholder="Телефон*"/>
                                </div>
                                <textarea className={classes.servicePageTask__form__textarea} placeholder="Комментарий" rows="5" cols="33"></textarea>
                                <button type="submit" className={classes.servicePageTask__form__submit}><span>Отправить</span></button>
                                <div className={classes.servicePageTask__form__checkbox}>
                                    <input type="checkbox" required={true} />
                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="13" height="13" rx="3" fill="#0C0C0D"/>
                                        <path fillRule="evenodd" clipRule="evenodd" d="M9.75 4.96262L6.71188 8.14824L5.69918 9.2102L4.68647 8.14824L4.69209 8.14235L3.25 6.61379L4.26297 5.55183L5.7048 7.08065L8.73729 3.90039L9.75 4.96262Z" fill="#0C0C0D"/>
                                    </svg>
                                    <div>Вы даете согласие на обработку персональных данных и соглашаетесь с политикой конфиденциальности</div>
                                </div>
                            </form>
                        </div>
                    </div>
                    )}
                    {content.content && (
                    <div className={classes.servicePageSeo}>
                        <div className={classes.servicePageSeo__wrapper}>
                                <ShowMore maxHeight={200} duration={1} allResolutions={true} btnText="Развернуть">
                                 <div dangerouslySetInnerHTML={{ __html: content.text }} />
                                </ShowMore>
                        </div>
                    </div>
                     )}
                </div>
                )}
            </div>
            <div className={'page-right'}>
                <div className={'page-burger'} onClick={() => menuToggle()}>
                    <div className={'page-burger__line'}></div>
                    <div className={'page-burger__line'}></div>
                    <div className={'page-burger__line'}></div>
                </div>
                <Form toggleVisible="visibleForm" />
            </div>
        </div>
    </> 
    );
}