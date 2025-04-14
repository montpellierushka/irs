import React from 'react' 
import classes from './team.module.scss'
import ContextData from '../../context/Data/ContextData' 
import { Link, useLocation } from 'react-router-dom'
import {menuToggle} from './../../modules/Menu/Menu'   
import Pagebutton from './../../modules/Pagebutton/Pagebutton'  
import Map from './../../modules/Map/Map'
import Form from './../../modules/Page/Form/Form' 
import Aboutnav from './../../modules/Navigation/Aboutnav/Aboutnav' 
import Leftnav from './../../modules/Navigation/Leftnav/Leftnav' 
import Loading from './../../modules/Loading/Loading'



export default function Team ({ fetchInitialData, serverData }) {    

    const { pathname } = useLocation();
  
    const {stateData, dispatchData} = React.useContext(ContextData) 

    const [content, setContent] = React.useState(() => {
    return __isBrowser__
      ? ((window.__INITIAL_PATH__ === pathname) ? window.__INITIAL_DATA__.backendTeam : (stateData.contextTeam) ? stateData.contextTeam : false)
      : serverData.backendTeam
    })
  
    if(!stateData.contextTeam && __isBrowser__){
        if(window.__INITIAL_PATH__ === pathname){  
            stateData.contextSEO.[pathname] = window.__INITIAL_DATA__.backendSEO;  
            stateData.contextTeam = window.__INITIAL_DATA__.backendTeam;
            dispatchData({
                type: "FETCH_TEAM",
                payload: stateData.contextTeam
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
        if(stateData.contextTeam){
          setContent(stateData.contextTeam)         
        } else {
          setLoading(true)
          fetchInitialData(false,false)
            .then((response) => {
              setContent(response.backendTeam)
              setLoading(false)  
              stateData.contextTeam = response.backendTeam;
              stateData.contextSEO.[pathname] = response.backendSEO;  
              dispatchData({
                type: "FETCH_TEAM",
                payload: stateData.contextTeam
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
                            <Aboutnav h1={'Наши сотрудники'}/>
                            <div className={classes.employees}> 
                                {content.map((item, i) => { 
                                    return(     
                                        <div className={classes.employees__element} key={"team"+i}>
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

            <Pagebutton btnText={"Хочу работать с вами"} to={"/contacts"} />

            <Map serverData={serverData} />
         
            </>
        )
     
} 