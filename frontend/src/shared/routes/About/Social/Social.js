import React from 'react' 
import classes from './social.module.scss'
import { Link } from 'react-router-dom'
import {menuToggle} from './../../../modules/Menu/Menu'   
import Pagebutton from './../../../modules/Pagebutton/Pagebutton'  
import Map from './../../../modules/Map/Map'
import Form from './../../../modules/Page/Form/Form' 
import Aboutnav from './../../../modules/Navigation/Aboutnav/Aboutnav' 
import Leftnav from './../../../modules/Navigation/Leftnav/Leftnav' 



export default function Socseti ({ fetchInitialData,serverData }) { 

    let social = __isBrowser__ ? window.__INITIAL_DATA__.SOCIAL : serverData.SOCIAL
 
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
                    
                    <Aboutnav h1={'Соцсети'}/>

                    <div className={classes.social}>
                        {(() => {
                            let soc = <></>;
                            if(social.facebook){
                                soc = <a href={social.facebook} target="_blank" rel="noreferrer" className={classes.social__link + " " + classes.social__linkFB}>
                                    <svg width="75" height="75" viewBox="0 0 75 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M70.858 0L4.1395 0C1.85487 0 0 1.85117 0 4.1395L0 70.858C0 73.1464 1.85487 75 4.1395 75H40.0588V45.9556H30.2855V34.635H40.0588V26.2868C40.0588 16.6012 45.9729 11.3243 54.6149 11.3243C58.7582 11.3243 62.3111 11.6343 63.3472 11.7689V21.8929L57.3528 21.8954C52.6539 21.8954 51.7474 24.1294 51.7474 27.4057V34.6312H62.9582L61.4923 45.9506H51.7462V74.9963H70.8568C73.1439 74.9963 75 73.1402 75 70.858V4.13703C74.9988 1.85117 73.1451 0 70.858 0Z" fill="white"/>
                                    </svg>
                                </a>;
                            }
                            return soc;
                        })()}
                        {(() => {
                            let soc = <></>;
                            if(social.instagram){
                                soc = <a href={social.instagram} target="_blank" rel="noreferrer" className={classes.social__link + " " + classes.social__linkINST}>
                                    <svg width="75" height="75" viewBox="0 0 75 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M75 10.9865L75 64.0129C75 70.0772 70.0782 74.999 64.0139 74.999L10.9875 74.999C4.92318 74.999 0.00139596 70.0772 0.0013957 64.0129L0.00139338 10.9865C0.00139312 4.92221 4.92318 0.00042268 10.9875 0.000422415L64.0139 0.000420097C70.0782 0.000419832 75 4.9222 75 10.9865ZM17.5792 37.4997C17.5792 48.3978 26.4561 57.2747 37.3542 57.2747C48.2526 57.2747 57.1292 48.3978 57.1292 37.4997C57.1292 26.6016 48.2526 17.7247 37.3542 17.7247C26.4561 17.7247 17.5792 26.6016 17.5792 37.4997ZM57.1292 13.3303C57.1292 15.7472 59.1067 17.7247 61.5237 17.7247C63.9406 17.7247 65.9181 15.7472 65.9181 13.3303C65.9181 10.9133 63.9406 8.9358 61.5237 8.9358C59.1067 8.9358 57.1292 10.9133 57.1292 13.3303Z" fill="white"/>
                                    </svg>
                                </a>;
                            }
                            return soc;
                        })()}
                        {(() => {
                            let soc = <></>;
                            if(social.vk){
                                soc = <a href={social.vk} target="_blank" rel="noreferrer" className={classes.social__link + " " + classes.social__linkVK}>
                                    <svg width="75" height="75" viewBox="0 0 75 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fillRule="evenodd" clipRule="evenodd" d="M3 0C1.34315 0 0 1.34314 0 3V71.9999C0 73.6567 1.34314 74.9999 3 74.9999H71.9999C73.6567 74.9999 74.9999 73.6568 74.9999 71.9999V3C74.9999 1.34315 73.6568 0 71.9999 0H3ZM42.4292 53.0077C41.9064 53.559 40.8856 53.6703 40.8856 53.6703H37.5053C37.5053 53.6703 30.0476 54.1102 23.4778 47.3979C16.3133 40.0747 9.98697 25.5451 9.98697 25.5451C9.98697 25.5451 9.62183 24.592 10.0174 24.1331C10.4628 23.6145 11.6771 23.5819 11.6771 23.5819L19.7573 23.5303C19.7573 23.5303 20.518 23.6525 21.0629 24.0462C21.5138 24.3721 21.7655 24.9776 21.7655 24.9776C21.7655 24.9776 23.0712 28.2197 24.8001 31.1522C28.1776 36.8788 29.7488 38.1306 30.8941 37.5169C32.5648 36.6236 32.0642 29.4226 32.0642 29.4226C32.0642 29.4226 32.0946 26.8104 31.2232 25.6456C30.5483 24.7441 29.2758 24.4807 28.7143 24.4074C28.2578 24.3476 29.0047 23.3104 29.9729 22.8461C31.4279 22.1482 33.995 22.1075 37.0295 22.1374C39.3946 22.1618 40.0751 22.3057 40.9991 22.5257C43.1433 23.0336 43.0764 24.6614 42.9319 28.1744C42.8887 29.2251 42.8386 30.4444 42.8386 31.8528C42.8386 32.1692 42.8292 32.5066 42.8195 32.8537C42.7694 34.6535 42.712 36.7145 43.9202 37.4816C44.5398 37.8726 46.0529 37.5386 49.8399 31.2282C51.6352 28.236 52.9796 24.7196 52.9796 24.7196C52.9796 24.7196 53.2755 24.0924 53.732 23.8236C54.1995 23.5493 54.8302 23.6335 54.8302 23.6335L63.3335 23.5819C63.3335 23.5819 65.8895 23.2805 66.3017 24.4155C66.736 25.6021 65.3473 28.3772 61.8729 32.9226C58.5772 37.2355 56.9733 38.8235 57.1206 40.2278C57.2282 41.254 58.2707 42.1821 60.2713 44.0038C64.4477 47.8099 65.5671 49.8124 65.8361 50.2936C65.8584 50.3335 65.8749 50.3629 65.8867 50.382C67.7595 53.4313 63.8093 53.6703 63.8093 53.6703L56.2548 53.7735C56.2548 53.7735 54.6338 54.0884 52.4982 52.6493C51.3796 51.8961 50.2864 50.6659 49.2453 49.4942C47.6552 47.7047 46.1863 46.0516 44.9326 46.4421C42.8275 47.0992 42.8911 51.5496 42.8911 51.5496C42.8911 51.5496 42.9077 52.5027 42.4292 53.0077Z" fill="white"/>
                                    </svg>
                                </a>;
                            }
                            return soc;
                        })()}                         
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
     
} 