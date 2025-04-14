import React from 'react' 
import ContextData from '../../context/Data/ContextData' 
import { useLocation,  Link } from 'react-router-dom'
import {menuToggle} from './../../modules/Menu/Menu'   
import Pagebutton from './../../modules/Pagebutton/Pagebutton'  
import Map from './../../modules/Map/Map' 
import Loading from './../../modules/Loading/Loading'
import Form from './../../modules/Page/Form/Form' 
import Aboutnav from './../../modules/Navigation/Aboutnav/Aboutnav' 
import Leftnav from './../../modules/Navigation/Leftnav/Leftnav' 




export default function Page ({ fetchInitialData, serverData }) {

    const { pathname } = useLocation();
  
    const {stateData, dispatchData} = React.useContext(ContextData) 

    const [content, setContent] = React.useState(() => {
    return __isBrowser__
      ? ((window.__INITIAL_PATH__ === pathname) ? window.__INITIAL_DATA__.pageBackendContent : (stateData.pagesContext[pathname] === undefined) ? false : stateData.pagesContext[pathname])
      : serverData.pageBackendContent
    })
  
    if((stateData.pagesContext[pathname] === undefined) && __isBrowser__){
        if(window.__INITIAL_PATH__ === pathname){  
            stateData.pagesContext[pathname] = window.__INITIAL_DATA__.pageBackendContent; 
            stateData.contextSEO[pathname] = window.__INITIAL_DATA__.backendSEO;
            dispatchData({
                type: "FETCH_PAGES",
                payload: stateData.pagesContext
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
        if(!(stateData.pagesContext[pathname] === undefined)){
          setContent(stateData.pagesContext[pathname] )         
        } else {
          setLoading(true)
          fetchInitialData(false,pathname)
            .then((response) => {
              setContent(response.pageBackendContent)
              setLoading(false)  
              stateData.pagesContext[pathname] = response.pageBackendContent;
              stateData.contextSEO[pathname] = response.backendSEO;
              dispatchData({
                type: "FETCH_PAGES",
                payload: stateData.pagesContext
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
                            <Aboutnav h1={content.title} menuShow={false} />
                            <div dangerouslySetInnerHTML={{__html: content['content'] }}></div> 
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