import React from 'react';
import { useLocation } from 'react-router-dom';
import ContextData from '../../context/Data/ContextData';
import classes from './services.module.scss';
import ShowMore from './ShowMore';
import TrustSlider from './TrustSlider';
import ProjectSlider from './ProjectSlider';
import Loading from './../../modules/Loading/Loading'

export default function ServiceDetail({ fetchInitialData, serverData }) {
    const { pathname } = useLocation();
    const { stateData, dispatchData } = React.useContext(ContextData);

    const [content, setContent] = React.useState(() => {
        return __isBrowser__
            ? (stateData.pagesContext[pathname] === undefined ? false : stateData.pagesContext[pathname])
            : serverData.pageBackendContent;
    });

    const [loading, setLoading] = React.useState(content ? false : true);
    const fetchNewContent = React.useRef(content ? false : true);

    React.useEffect(() => {
        if (fetchNewContent.current === true) {
            if (!(stateData.pagesContext[pathname] === undefined)) {
                setContent(stateData.pagesContext[pathname]);
                setLoading(false);
            } else {
                setLoading(true);
                fetchInitialData(false, pathname)
                    .then((response) => {
                        setContent(response.pageBackendContent);
                        setLoading(false);
                        stateData.pagesContext[pathname] = response.pageBackendContent;
                        dispatchData({
                            type: "FETCH_SERVICES",
                            payload: stateData.pagesContext
                        });
                    });
            }
        } else {
            fetchNewContent.current = true;
        }
    }, [fetchNewContent, stateData, dispatchData, pathname]);

    if (loading) return <div>Загрузка...</div>;
    console.log(content);
    return (
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

              <div className={classes.servicePageTop}>
                  <div className={classes.servicePageTop__left}>
                      <h1 className={classes.servicePageTop__title}>Создание продающих<br/> интернет-магазинов</h1>
                      <div className={classes.servicePageTop__text}>Вы получите интернет-магазин, правильный с точки<br/> зрения продаж и интернет-маркетинга</div>
                      <div className={classes.servicePageTop__gifts}>
                          <div>
                              <img src="/img/services/gift.svg"/>
                              <span>Бесплатно нарисуем<br/> дизайн главной страницы</span>
                          </div>
                          <div>
                              <img src="/img/services/gift.svg"/> 
                              <span>Посоветуем, как получить заявки<br/> и продажи от интернет-магазина</span>
                          </div>
                      </div>
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
              <div className={classes.servicePageWhy}>
                  <h2>Зачем вам интернет-магазин?</h2>
                  <div className={classes.servicePageWhy__list}>
                      <div className={classes.servicePageWhy__item}>
                          <span></span>
                          Высокомаржинальные<br/> продажи через интернет
                      </div>
                      <div className={classes.servicePageWhy__item}>
                          <span></span>
                          Комфорт и экономия<br/> времени покупателей
                      </div>
                      <div className={classes.servicePageWhy__item}>
                          <span></span>
                          Информирование<br/> клиентов о акциях
                      </div>
                      <div className={classes.servicePageWhy__item}>
                          <span></span>
                          Популяризация<br/> бренда компании
                      </div>
                      <div className={classes.servicePageWhy__item}>
                          <span></span>
                          Увеличение лояльности<br/> покупателей
                      </div>
                      <div className={classes.servicePageWhy__item}>
                          <span></span>
                          Простота в учете товаров<br/> и прозрачная отчетность
                      </div>
                    </div>
              </div>
              <div className={classes.servicePageHelp}>
                  <h2>У вас крутой продукт, о котором мало кто знает?<br/> <span>Мы поможем!</span></h2>
                  <div className={classes.servicePageHelp_list}>
                      <div className={classes.servicePageHelp_item}>
                          <div className={classes.servicePageHelp_item_digit}>25</div>
                          <span className={classes.servicePageHelp_item_subtitle}>специалистов</span>
                          <p className={classes.servicePageHelp_item_text}>7 лет средний срок работы специалистов в нашей<br/> компании, от 12 лет в отрасли.</p>
                      </div>
                      <div className={classes.servicePageHelp_item}>
                          <div className={classes.servicePageHelp_item_digit}>13</div>
                          <span className={classes.servicePageHelp_item_subtitle}>наград</span>
                          <p className={classes.servicePageHelp_item_text}>С 2015 года создаем сайты и бренды, помогаем бизнесу<br/> клиентов покорять новые вершины в digital-среде.</p>
                      </div>
                      <div className={classes.servicePageHelp_item}>
                          <div className={classes.servicePageHelp_item_digit}>10</div>
                          <span className={classes.servicePageHelp_item_subtitle}>лет на рынке</span>
                          <p className={classes.servicePageHelp_item_text}> С 2015 года создаем сайты и бренды, помогаем бизнесу<br/> клиентов покорять новые вершины в digital-среде.</p>
                      </div>
                      <div className={classes.servicePageHelp_item}>
                          <div className={classes.servicePageHelp_item_digit}>1732</div>
                          <span className={classes.servicePageHelp_item_subtitle}>довольных клиентов</span>
                          <p className={classes.servicePageHelp_item_text}>7 лет средний срок работы специалистов в нашей<br/> компании, от 12 лет в отрасли.</p>
                      </div>
                  </div>
              </div>
              <div className={classes.servicePageWork}>
                  <h2>Над вашим сайтом работают</h2>
                  <div className={classes.servicePageWork__list}>
                      <div className={classes.servicePageWork__item}>
                          <h3>Интернет-маркетолог</h3>
                          <p>Занимается привлечением клиентов и увеличением продаж через digital-каналы</p>
                      </div>
                      <div className={classes.servicePageWork__item}>
                          <h3>СЕО-специалист</h3>
                          <p>Занимается привлечением клиентов и увеличением продаж через digital-каналы</p>
                      </div>
                      <div className={classes.servicePageWork__item}>
                          <h3>Копирайтер</h3>
                          <p>Занимается привлечением клиентов и увеличением продаж через digital-каналы</p>
                      </div>
                      <div className={classes.servicePageWork__item}>
                          <h3>Программист</h3>
                          <p>Занимается привлечением клиентов и увеличением продаж через digital-каналы</p>
                      </div>
                      <div className={classes.servicePageWork__item}>
                          <h3>Контент-манеджер</h3>
                          <p>Занимается привлечением клиентов и увеличением продаж через digital-каналы</p>
                      </div>
                      <div className={classes.servicePageWork__item}>
                          <h3>Аккаунт-менеджер</h3>
                          <p>Занимается привлечением клиентов и увеличением продаж через digital-каналы</p>
                      </div>
                  </div>
              </div>
              <div className={classes.servicePageStart}>
                  <div className={classes.servicePageStart__left}>
                      <img src="/img/services/start-img.png"/>
                  </div>
                  <div className={classes.servicePageStart__right}>
                      <h2>С чего начнем?</h2>
                      <p>На старте перед разработкой мы вникнем в специфику вашего бизнеса и посоветуем, как правильно действовать, чтобы получить больше продаж. Затем бесплатно сделаем дизайн главной страницы, за это время полностью поймем ваши цели создания сайта и сделаем так, чтобы он их выполнял.</p>
                  </div>
              </div>
              <div className={classes.servicePageWhyWe}>
                  <h2>Почему стоит обратиться к нам?</h2>
                  <div className={classes.servicePageWhyWe_list}>
                      <div className={classes.servicePageWhyWe_item}>
                          <span></span>
                          У нас за плечами разработка 130+ интернет-магазинов, приносящих прибыль
                      </div>
                      <div className={classes.servicePageWhyWe_item}>
                          <span></span>
                          Построим интерактивный прототип с вашим утверждением
                      </div>
                      <div className={classes.servicePageWhyWe_item}>
                          <span></span>
                          Проведем полный и профессиональный аудит перед запуском сайта
                      </div>
                      <div className={classes.servicePageWhyWe_item}>
                          <span></span>
                          Имеем обширный опыт успешной интеграции с Битрикс 1С
                      </div>
                      <div className={classes.servicePageWhyWe_item}>
                          <span></span>
                          Подключим СЕО, соцсети, контекст, таргет и другое продвижение
                      </div>
                      <div className={classes.servicePageWhyWe_item}>
                          <span></span>
                          Сделаем ресурс доступным с любого устройства с помощью верстки
                      </div>
                      <div className={classes.servicePageWhyWe_item}>
                          <span></span>
                          Скрупулезно подходим ко всем деталям создания интернет-магазина
                      </div>
                      <div className={classes.servicePageWhyWe_item}>
                          <span></span>
                          Правильно организуем процесс создания интернет-магазина
                      </div>
                    </div>
              </div>
              <div className={classes.servicePageGoal}>
                  <div className={classes.servicePageGoal_left}>
                      <img src="/img/services/goal-img.png"/>
                  </div>
                  <div className={classes.servicePageGoal_right}>
                      <h2><span>Наша цель - </span>довести<br/> вас до результата</h2>
                      <p>Мы создаем не просто интернет-магазины, а эффективные продающие системы. Наша работа — обеспечить устойчивую конверсию, стабильный рост заказов и предсказуемую прибыль вашего бизнеса.</p>
                  </div>
              </div>
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
                      <TrustSlider />
                  </div>
              </div>
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
                      <ProjectSlider />
                  </div>
              </div>
              <div className={classes.servicePageChoose}>
                  <h2>Выбирая нас, вы получаете</h2>
                  <div className={classes.servicePageChoose_list}>
                      <div className={classes.servicePageChoose_item}>
                          <p className={classes.servicePageChoose_item_text}>Простой в обращении интернет-магазин: обучим вас самостоятельно размещать товары, управлять сайтом</p>
                      </div>
                      <div className={classes.servicePageChoose_item}>
                          <p className={classes.servicePageChoose_item_text}>Прозрачный учет поступивших средств и товаров, благодаря 1С Бухгалтерия и 1С Склад</p>
                      </div>
                      <div className={classes.servicePageChoose_item}>
                          <p className={classes.servicePageChoose_item_text}>Выполнение всех работ четко по плану и в срок</p>
                      </div>
                      <div className={classes.servicePageChoose_item}>
                          <p className={classes.servicePageChoose_item_text}>Еженедельный отчет для вас о проделанной нами работе по разработке и продвижению</p>
                      </div>
                      <div className={classes.servicePageChoose_item}>
                          <p className={classes.servicePageChoose_item_text}>Подключение онлайн-кассы к сайту для отправки чеков</p>
                      </div>
                      <div className={classes.servicePageChoose_item}>
                          <p className={classes.servicePageChoose_item_text}>Сайт, способный выдерживать высокие нагрузки с возможностью добавления нового функционала</p>
                      </div>
                  </div>
              </div>
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
              <div className={classes.servicePageSeo}>
                  <div className={classes.servicePageSeo__wrapper}>
                        <ShowMore maxHeight={200} duration={1} allResolutions={true} btnText="Развернуть">
                          <h2>Закажите создание интернет-магазина в Новосибирске в нашем digital-агентстве</h2>
                          <p>Рынок интернет-продаж в России несется вперед семимильными шагами. Ежегодно происходит прирост онлайн-торговли на 30+ процентов. По темпам роста в этой сфере наша страна занимает одну из лидирующих позиций. Все больше людей выбирают покупки через интернет. Все больше компаний заказывает разработку собственного онлайн-шопа.<br/><br/>
                          Если вы до сих пор не обзавелись своим веб-ресурсом, предназначенным для продаж, то обязательно обратитесь к нам за разработкой интернет-магазина под ключ по выгодной цене. Самое время присоединиться к тренду.<br/><br/></p>

                          <h2>Что такое интернет-магазин</h2>
                          <p>Специализированные площадки для продаж онлайн называют интернет-магазинами. С помощью таких площадок люди могут удаленно, из любой точки мира:</p>
                          <ul>
                              <li>Изучать ассортимент компании, его характеристики, цены;</li>
                              <li>Выбирать понравившиеся товары;</li>
                              <li>В несколько кликов совершать их покупку;</li>
                              <li>Оформлять доставку.</li>
                          </ul>
                        </ShowMore>
                  </div>
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
    );
}