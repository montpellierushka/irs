import React from 'react' 
import classes from './about.module.scss'
import { Link, useLocation } from 'react-router-dom'
import {menuToggle} from './../../modules/Menu/Menu'   
import Pagebutton from './../../modules/Pagebutton/Pagebutton'  
import Map from './../../modules/Map/Map'
import Form from './../../modules/Page/Form/Form' 
import Aboutnav from './../../modules/Navigation/Aboutnav/Aboutnav' 
import Leftnav from './../../modules/Navigation/Leftnav/Leftnav' 
import Loading from './../../modules/Loading/Loading'
import ContextData from '../../context/Data/ContextData' 


export default function About ({ fetchInitialData, serverData }) {   

    const { pathname } = useLocation();
  
    const {stateData, dispatchData} = React.useContext(ContextData) 

    const [content, setContent] = React.useState(() => {
    return __isBrowser__
      ? ((window.__INITIAL_PATH__ === pathname) ? window.__INITIAL_DATA__.backendContent : (stateData.contextAbout) ? stateData.contextAbout : false)
      : serverData.backendContent
    })
  
    if(!stateData.contextAbout && __isBrowser__){
        if(window.__INITIAL_PATH__ === pathname){  
            stateData.contextSEO[pathname] = window.__INITIAL_DATA__.backendSEO;  
            stateData.contextAbout = window.__INITIAL_DATA__.backendContent;
            dispatchData({
                type: "FETCH_ABOUT",
                payload: stateData.contextAbout
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
        if(stateData.contextAbout){
          setContent(stateData.contextAbout)         
        } else {
          setLoading(true)
          fetchInitialData(false,false)
            .then((response) => {
              setContent(response.backendContent)
              setLoading(false)  
              stateData.contextAbout = response.backendContent;
              stateData.contextSEO[pathname] = response.backendSEO;  
              dispatchData({
                type: "FETCH_ABOUT",
                payload: stateData.contextAbout
              }) 
            })
        }
      } else {
        fetchNewContent.current = true
      }
    }, [fetchNewContent,stateData, dispatchData, pathname])
 
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
                


                    {(() => {
                        if (loading === true) {
                            return <Loading />
                        } 
                        return <>
                            <Aboutnav h1={'О компании'}/>

                            <div className={classes.about} dangerouslySetInnerHTML={{ __html: "<h2>Студия “Информационные Решения Сибири” основана в 2010 году:</h2>"+content.MAIN_SLIDE4.text }} />


                            {content.MAIN_SLIDE4.items.map((el, i) => {
                                return (
                                    <div className={classes.aboutRow} key={'company'+i}>
                                        {el.map((item, index) => {
                                            return (
                                                <div className={classes.aboutRow__element} key={i+'bottomCompany'+index}>
                                                    <div className={classes.aboutRow__title} dangerouslySetInnerHTML={{ __html: item.title }} />
                                                    <div className={classes.aboutRow__text} dangerouslySetInnerHTML={{ __html: item.text }} />
                                                </div>
                                            )
                                        })}
                                    </div>
                                )
                            })}  


                            {(() => {
                                if (content.brains) {
                                    return <>
                                        <div className={classes.employees}>
                                            <div className={classes.employees__title}>Главные умы компании на данный момент</div>
                                            {content.brains.map((item, index) => {
                                                return (
                                                    <div className={classes.employees__element} key={'brains'+index}>
                                                        <div className={classes.employees__ava}>
                                                            <img className={classes.employees__image} src={item.ava} alt="ava" width="360" height="360" loading="lazy" />
                                                        </div>
                                                        <div className={classes.employees__name} dangerouslySetInnerHTML={{__html: item.name}} /> 
                                                        <div className={classes.employees__text} dangerouslySetInnerHTML={{__html: item.role}} /> 
                                                    </div>
                                                )
                                            })}
                                            
                                        </div>
                                    </>
                                } 
                                return <></>
                            })()} 

                            {(() => {
                                if (content.leads) {
                                    return <>
                                        <div className={classes.employees}>
                                            <div className={classes.employees__title}>Ведущие специалисты</div>
                                            {content.leads.map((item, index) => {
                                                return (
                                                    <div className={classes.employees__element} key={'leads'+index}>
                                                        <div className={classes.employees__ava}>
                                                            <img className={classes.employees__image} src={item.ava} alt="ava" width="360" height="360" loading="lazy" />
                                                        </div>
                                                        <div className={classes.employees__name} dangerouslySetInnerHTML={{__html: item.name}} /> 
                                                        <div className={classes.employees__text} dangerouslySetInnerHTML={{__html: item.role}} /> 
                                                    </div>
                                                )
                                            })}
                                            
                                        </div>
                                    </>
                                } 
                                return <></>
                            })()}  

                        </>
                    })()}  


                    

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

            <Pagebutton btnText={"Хочу работать с вами"} to={"#"} />

            <Map serverData={serverData} />
         
            </>
        )
     
} 