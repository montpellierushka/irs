import './style.css';
import React from 'react'
import ReactFullpage from '@fullpage/react-fullpage'; 
import First from './First/First'
import Contacts from './Contacts/Contacts'
import Services from './Services/Services'
import Works from './Works/Works'
import Company from './Company/Company'
import Interesting from './Interesting/Interesting'
import Container from './../../modules/Map/Container' 
import Loading from './../../modules/Loading/Loading' 

import { useLocation } from 'react-router-dom'
import ContextData from './../../context/Data/ContextData'  
 
 

var FPapi 
 
export const plusSlides = () =>{ 
    FPapi.moveSectionDown()
}
export const reBuilder = () =>{   
    FPapi.reBuild()
} 
export const fpMoveSection = (section = 'main') =>{   
    FPapi.moveTo(section)
} 
 
var mapScroll = 0;
var scrollArray;
var scrollChecker = 0;
var canInc = true;
var canStage = true;

//var scrollTimeOut = Date.now();

function wheel(e){ 
    
    var FPsection = FPapi.getActiveSection().anchor; 

    if(FPsection === 'contacts' || FPsection === 'main'){
        FPapi.setMouseWheelScrolling(false); 
    } else {
        FPapi.setMouseWheelScrolling(true); 
    }



    //if( (Date.now() - scrollTimeOut > 80) || (FPsection === 'contacts')){
 
     
        let scrollStr = FPapi.getActiveSection().item.scrollTop;

        if(scrollStr === scrollArray){ 
            if(canInc){
                scrollChecker++;
                if(scrollChecker >= 2){
                    canInc = false;
                    setTimeout(function(){canInc = true}, 500);
                }
            }
        } else { 
            scrollChecker = 0;
            scrollArray = scrollStr;
        } 
        if(FPsection === 'main' && canStage){        
            canStage = false;
            setTimeout(function(){canStage = true}, 500); 
            if(e.deltaY > 0){ 
                if(FPapi.getActiveSection().item.getAttribute('data-stage') === "1"){ 
                    FPapi.getActiveSection().item.setAttribute('data-stage',"2") 
                } else if(FPapi.getActiveSection().item.getAttribute('data-stage') === "2"){ 
                    FPapi.getActiveSection().item.setAttribute('data-stage',"3")
                } else if(FPapi.getActiveSection().item.getAttribute('data-stage') === "3"){
                    scrollChecker = 0;
                    FPapi.moveTo('services')
                }
            } 
            if(e.deltaY < 0){
                if(FPapi.getActiveSection().item.getAttribute('data-stage') === "2"){ 
                    FPapi.getActiveSection().item.setAttribute('data-stage',"1")
                } else if(FPapi.getActiveSection().item.getAttribute('data-stage') === "3"){ 
                    FPapi.getActiveSection().item.setAttribute('data-stage',"2")
                }
            }          
        }

        if(FPsection === 'contacts'){
            if(__isBrowser__){
                var map = document.querySelector("#map");
                if(map){
                    if(e.deltaY > 0){
                        mapScroll += 5; 
                    } else if(e.deltaY < 0) {
                        mapScroll -= 5;
                    }
                    if(mapScroll <= 0){
                        mapScroll = 5;
                    } else if(mapScroll > 100){
                        mapScroll = 100;
                    }
                    map.style.clipPath = 'circle('+mapScroll+'% at center)';
                }
                if(!document.querySelector("#mapContainer").classList.contains('show') && scrollChecker >= 2 && e.deltaY < 0 && mapScroll === 5){
                    scrollChecker = 0;
                    FPapi.moveTo('interesting')
                }
            }
        }

    //}
    //scrollTimeOut = Date.now();
}

export default function Main ({ fetchInitialData, serverData }) {

    const { pathname } = useLocation();

    const {stateData, dispatchData} = React.useContext(ContextData) 


    const [content, setContent] = React.useState(() => {
    return __isBrowser__
      ? ((window.__INITIAL_PATH__ === pathname) ? window.__INITIAL_DATA__ : (Object.keys(stateData.main).length > 0) ? stateData.main : false)
      : serverData
    })
  


    if((Object.keys(stateData.main).length === 0) && __isBrowser__){
        if(window.__INITIAL_PATH__ === pathname){ 
            stateData.contextSEO[pathname] = window.__INITIAL_DATA__.backendSEO; 
            dispatchData({
              type: "FETCH_MAIN",
              payload: window.__INITIAL_DATA__
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
        if(Object.keys(stateData.main).length > 0){
          setContent(stateData.main)         
        } else {
          setLoading(true)
          fetchInitialData()
            .then((content) => {
              setContent(content);
              stateData.contextSEO[pathname] = content.backendSEO;
              setLoading(false);
              dispatchData({
                  type: "FETCH_MAIN",
                  payload: content
              }) 
            })
        }
      } else {
        fetchNewContent.current = true
      }
    }, [fetchNewContent,stateData, dispatchData, pathname])



    if (loading === true) {
        return <Loading />
    }

 
    return (    
        <> 

        <main onWheel = {(e) => wheel(e)}>   
            
            <div id="worksImage"></div> 
            <Container serverData={serverData} />

            <ReactFullpage 
                licenseKey = {'YOUR_KEY_HERE'}
                scrollingSpeed = {500}       
                scrollOverflow = {true}  
                scrollOverflowMacStyle = {false}
                css3 = {false} 
                menu = {'#menu'} 
                anchors = {['main','services','works','company','interesting','contacts']}
                afterLoad = {function(origin, destination, direction){
                               /* var params = {
                                    origin: origin,
                                    destination: destination,
                                    direction: direction
                                };     
                                if(FPapi){FPapi.reBuild()}*/
                                scrollArray = "";
                                scrollChecker = 0;
                            }}
                render={({ state, fullpageApi }) => {  
                    //console.log(state) 
                    if(fullpageApi){ 
                        FPapi = fullpageApi 
                        //fullpageApi.setAllowScrolling(false)
                        fullpageApi.setMouseWheelScrolling(false)
                    } 

                    return ( 
                        <ReactFullpage.Wrapper> 
                            <div className="section" data-stage="1" data-div="first">
                                <div id="videoImage"></div>
                                <First MAIN_SLIDE1={content.MAIN_SLIDE1} serverData={serverData} />
                            </div>
                            <div className="section"> 
                                <Services MAIN_SLIDE2={content.MAIN_SLIDE2} serverData={serverData}  />
                            </div>
                            <div className="section">
                                <Works MAIN_SLIDE3={content.MAIN_SLIDE3} serverData={serverData}  />
                            </div>
                            <div className="section">
                                <Company MAIN_SLIDE4={content.MAIN_SLIDE4} serverData={serverData} />
                            </div>
                            <div className="section">
                                <Interesting MAIN_SLIDE5={content.MAIN_SLIDE5} serverData={serverData}  />
                            </div>
                            <div className="section" data-div="contacts">
                                <Contacts serverData={serverData} />
                            </div>
                        </ReactFullpage.Wrapper> 
                    );
                }}
            />
        </main> 
        </>
    )
}
