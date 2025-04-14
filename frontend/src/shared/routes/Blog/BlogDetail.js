import React from 'react' 
import ContextData from '../../context/Data/ContextData'
import classes from './blog.module.scss'
import { useLocation, Link } from 'react-router-dom'
import {menuToggle} from './../../modules/Menu/Menu'   
import Pagebutton from './../../modules/Pagebutton/Pagebutton'  
import Map from './../../modules/Map/Map'
import Form from './../../modules/Page/Form/Form' 
import Loading from './../../modules/Loading/Loading' 
import Aboutnav from './../../modules/Navigation/Aboutnav/Aboutnav' 
import Leftnav from './../../modules/Navigation/Leftnav/Leftnav' 


export default function BlogDetail ({ fetchInitialData, serverData }) {  
    
    const { pathname } = useLocation();

    const {stateData, dispatchData} = React.useContext(ContextData) 

    const [content, setContent] = React.useState(() => { 
        return __isBrowser__
          ? ((window.__INITIAL_PATH__ === pathname) ? window.__INITIAL_DATA__.blogDetailBackendContent : (stateData.blogDetailsContext[pathname]) ? stateData.blogDetailsContext[pathname] : false)
          : serverData.blogDetailBackendContent
    })

    if ( !(stateData.blogDetailsContext[pathname]) && __isBrowser__ ) {
        if(window.__INITIAL_PATH__ === pathname){  
            stateData.blogDetailsContext[pathname] = window.__INITIAL_DATA__.blogDetailBackendContent; 
            stateData.contextSEO[pathname] = window.__INITIAL_DATA__.backendSEO;
            dispatchData({
              type: "FETCH_BLOG_DETAIL",
              payload: stateData.blogDetailsContext
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
        if(stateData.blogDetailsContext[pathname]){
          setContent(stateData.blogDetailsContext[pathname])         
        } else {
          setLoading(true)
          fetchInitialData(false, pathname)
            .then((response) => {
              setContent(response.blogDetailBackendContent)
              setLoading(false) 
              stateData.blogDetailsContext[pathname] = response.blogDetailBackendContent;
              stateData.contextSEO[pathname] = response.backendSEO;
              dispatchData({
                  type: "FETCH_BLOG_DETAIL",
                  payload: stateData.blogDetailsContext
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
                        <Aboutnav h1={content.title} />
                        <div className={classes.newDetail} dangerouslySetInnerHTML={{__html: content.text }}></div> 
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