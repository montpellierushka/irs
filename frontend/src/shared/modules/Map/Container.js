import React from 'react'  

 

function hideMap(){
    if(__isBrowser__){
        document.querySelector('#mapContainer').classList.remove('show');
    }
}

export default function Container ({ serverData }) { 

    let MAIN_SLIDE6 = __isBrowser__ ? window.__INITIAL_DATA__.MAIN_SLIDE6 : serverData.MAIN_SLIDE6 

    return (      

        <div id="mapContainer">                
            <div id="map">
                <img src="/img/main/map.jpg" id="map__image" width="2560" height="1440" loading="lazy" alt="map" />
                <iframe title="Карта" id="map__frame" data-src={MAIN_SLIDE6.frame} width="100" height="720"></iframe> 
                <div id="map__back" onClick={() => hideMap()}>Назад</div>
            </div>
            <div id="map__overlay"></div>
        </div>
 
         
    )
} 