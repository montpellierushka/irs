import './style.css'
import React from 'react' 
import classes from './sidebar.module.scss'
import Social from './../Social/Social' 
import Form from './../../../modules/Page/Form/Form' 
import sound from './Sound.mp3'
import {menuToggle} from './../../../modules/Menu/Menu'    
import {fpMoveSection} from './../../../routes/Main/Main'       
import { Link } from 'react-router-dom'



class Sidebar extends React.Component {
    constructor(props) {
        super(props);   
        this.state = {
            serverData: props.serverData,
            playing: false,
            soundTEXT: "Звук выкл.",
            soundSVG: "stopped" 
        } 
        this.audio = false;
    } 

    componentDidMount() {
        
    }
 
  
    play = () => { 
        if(!this.audio){
            this.audio = new Audio(sound);
            this.audio.volume = 0.1;
            this.audio.addEventListener('ended', () => {this.setState({playing: false, soundTEXT: "Звук выкл.", soundSVG: "stopped"})} ); 
        }
        this.setState({playing: true, soundTEXT: "Звук вкл.", soundSVG: ""});  
        this.audio.play();
    }
  
    pause = () => {
        this.setState({playing: false, soundTEXT: "Звук выкл.", soundSVG: "stopped"});  
        this.audio.pause();
    } 


 


    render() {

        return ( 
            <aside className={classes.sidebar}>
                <img src="/logo.svg" className={classes.sidebar__logo} width="140" height="35" alt="logo" />
                <Link to="/#main" data-link="main">
                    <img src="/logo.svg" className={classes.sidebar__logo2} width="140" height="35" alt="logo" />
                </Link>
                <ul id="menu" className={classes.sidebar__nav}>
                    <li className={classes.sidebar__li} data-menuanchor="main"><a className={classes.sidebar__link} href="#main" onClick={() => fpMoveSection("main")}>Главная</a></li>
                    <li className={classes.sidebar__li} data-menuanchor="services"><a className={classes.sidebar__link} href="#services" onClick={() => fpMoveSection("services")}>Услуги</a></li>
                    <li className={classes.sidebar__li} data-menuanchor="works"><a className={classes.sidebar__link} href="#works" onClick={() => fpMoveSection("works")}>Наши работы</a></li>
                    <li className={classes.sidebar__li} data-menuanchor="company"><a className={classes.sidebar__link} href="#company" onClick={() => fpMoveSection("company")}>Компания</a></li>
                    <li className={classes.sidebar__li} data-menuanchor="interesting"><a className={classes.sidebar__link} href="#interesting" onClick={() => fpMoveSection("interesting")}>Интересное</a></li>
                    <li className={classes.sidebar__li} data-menuanchor="contacts"><a className={classes.sidebar__link} href="#contacts" onClick={() => fpMoveSection("contacts")}>Контакты</a></li>
                    <li></li>
                </ul>
                <Social serverData={this.state.serverData} />
                <div className={classes.burger} data-div="sidebar-burger" onClick={() => menuToggle()}>
                    <div className={classes.burger__line}></div>
                    <div className={classes.burger__line}></div>
                    <div className={classes.burger__line}></div>
                </div>
                
                <div onClick={() => {if(this.state.playing){
                                            this.pause();  
                                        } else {
                                            this.play();  
                                        }  
                                    }
                              } className={classes.sound}>

                    <div id="soundTEXT" className={classes.sound__text}>{this.state.soundTEXT}</div>
                    <div id="soundSVG" className={"playing "+this.state.soundSVG}>
                        <svg className={classes.sound__svg} width="39" height="28" fill="#fff">
                            <rect height="20%" width="3.8361%"  x="0%" rx="5%" ry="5%">
                                <animate attributeName= "height" values="20%; 100%; 20%" dur="0.7s" repeatCount="indefinite"/>
                                <animate attributeName= "y" values="40%; 0%; 40%;" dur="0.7s" repeatCount="indefinite"/>
                            </rect> 
                            <rect height="20%" width="3.8361%"  x="9.6033%" rx="5%" ry="5%">
                                <animate attributeName= "height" values="20%; 100%; 20%" dur="0.7s" begin="0.15s" repeatCount="indefinite"/>
                                <animate attributeName= "y" values="40%; 0%; 40%;" dur="0.7s" begin="0.15s" repeatCount="indefinite"/>
                            </rect> 
                            <rect height="20%" width="3.8361%"  x="19.2066%" rx="5%" ry="5%">
                                <animate attributeName= "height" values="20%; 100%; 20%" dur="0.7s" begin="0.3s" repeatCount="indefinite"/>
                                <animate attributeName= "y" values="40%; 0%; 40%;" dur="0.7s" begin="0.3s" repeatCount="indefinite"/>
                            </rect> 
                            <rect height="20%" width="3.8361%"  x="28.8099%" rx="5%" ry="5%">
                                <animate attributeName= "height" values="20%; 100%; 20%" dur="0.7s" begin="0.45s" repeatCount="indefinite"/>
                                <animate attributeName= "y" values="40%; 0%; 40%;" dur="0.7s" begin="0.45s" repeatCount="indefinite"/>
                            </rect> 
                            <rect height="20%" width="3.8361%"  x="38.4132%" rx="5%" ry="5%">
                                <animate attributeName= "height" values="20%; 100%; 20%" dur="0.7s" begin="0.6s" repeatCount="indefinite"/>
                                <animate attributeName= "y" values="40%; 0%; 40%;" dur="0.7s" begin="0.6s" repeatCount="indefinite"/>
                            </rect> 
                            <rect height="20%" width="3.8361%"  x="48.0165%" rx="5%" ry="5%">
                                <animate attributeName= "height" values="20%; 100%; 20%" dur="0.7s" repeatCount="indefinite"/>
                                <animate attributeName= "y" values="40%; 0%; 40%;" dur="0.7s" repeatCount="indefinite"/>
                            </rect> 
                            <rect height="20%" width="3.8361%"  x="57.6198%" rx="5%" ry="5%">
                                <animate attributeName= "height" values="20%; 100%; 20%" dur="0.7s" begin="0.15s" repeatCount="indefinite"/>
                                <animate attributeName= "y" values="40%; 0%; 40%;" dur="0.7s" begin="0.15s" repeatCount="indefinite"/>
                            </rect> 
                            <rect height="20%" width="3.8361%"  x="67.2231%" rx="5%" ry="5%">
                                <animate attributeName= "height" values="20%; 100%; 20%" dur="0.7s" begin="0.3s" repeatCount="indefinite"/>
                                <animate attributeName= "y" values="40%; 0%; 40%;" dur="0.7s" begin="0.3s" repeatCount="indefinite"/>
                            </rect> 
                            <rect height="20%" width="3.8361%"  x="76.8264%" rx="5%" ry="5%">
                                <animate attributeName= "height" values="20%; 100%; 20%" dur="0.7s" begin="0.45s" repeatCount="indefinite"/>
                                <animate attributeName= "y" values="40%; 0%; 40%;" dur="0.7s" begin="0.45s" repeatCount="indefinite"/>
                            </rect> 
                            <rect height="20%" width="3.8361%"  x="86.4297%" rx="5%" ry="5%">
                                <animate attributeName= "height" values="20%; 100%; 20%" dur="0.7s" begin="0.6s" repeatCount="indefinite"/>
                                <animate attributeName= "y" values="40%; 0%; 40%;" dur="0.7s" begin="0.6s" repeatCount="indefinite"/>
                            </rect> 
                            <rect height="20%" width="3.8361%"  x="96.033%" rx="5%" ry="5%">
                                <animate attributeName= "height" values="20%; 100%; 20%" dur="0.7s" begin="0.7s" repeatCount="indefinite"/>
                                <animate attributeName= "y" values="40%; 0%; 40%;" dur="0.7s" begin="0.7s" repeatCount="indefinite"/>
                            </rect> 
                        </svg>
                    </div>
                </div>

                <Form />
                       
            </aside>  
        )
    }
} 


export default Sidebar