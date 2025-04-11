import React from 'react' 
import ContextData from '../../context/Data/ContextData'
import classes from './blog.module.scss'
import { useLocation, Link, useParams } from 'react-router-dom'
import {menuToggle} from './../../modules/Menu/Menu'   
import Pagebutton from './../../modules/Pagebutton/Pagebutton'  
import Map from './../../modules/Map/Map'
import Form from './../../modules/Page/Form/Form' 
import Loading from './../../modules/Loading/Loading' 
import Aboutnav from './../../modules/Navigation/Aboutnav/Aboutnav' 
import Leftnav from './../../modules/Navigation/Leftnav/Leftnav' 


export default function Blog ({ fetchInitialData, serverData }) {  
    const { pathname } = useLocation();
    let realPath = pathname;

    let currentBlogCategory = 'all';

    if(pathname.startsWith('/blog/articles')){
        currentBlogCategory = 'articles';
        realPath = pathname.replace('/articles', '')+"?category=articles";
    }
    if(pathname.startsWith('/blog/news')){
        currentBlogCategory = 'news';
        realPath = pathname.replace('/news', '')+"?category=news";
    }
    if(pathname.startsWith('/blog/sales')){
        currentBlogCategory = 'sales';
        realPath = pathname.replace('/sales', '')+"?category=sales";
    }
    if(pathname.startsWith('/blog/education')){
        currentBlogCategory = 'education';
        realPath = pathname.replace('/education', '')+"?category=education";
    }


    let { currentPage } = useParams(); 

    let page = 1;

    if(currentPage){
        page = currentPage        
    }
    

    const {stateData, dispatchData} = React.useContext(ContextData) 

    const [content, setContent] = React.useState(() => { 
        return __isBrowser__
          ? ((window.__INITIAL_PATH__ === pathname) ? window.__INITIAL_DATA__.blogBackendContent : (stateData.blogContext[currentBlogCategory][page]) ? stateData.blogContext[currentBlogCategory][page] : false)
          : serverData.blogBackendContent
    })
  
    if(!(stateData.blogContext[currentBlogCategory][page]) && __isBrowser__){
        if(window.__INITIAL_PATH__ === pathname){
            stateData.blogCountsContext[currentBlogCategory] = window.__INITIAL_DATA__.blogBackendCount;  
            stateData.blogContext[currentBlogCategory][page] = window.__INITIAL_DATA__.blogBackendContent;
            stateData.contextSEO.[pathname] = window.__INITIAL_DATA__.backendSEO;
            dispatchData({
              type: "FETCH_BLOG",
              payload: stateData.blogContext
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
        if(stateData.blogContext[currentBlogCategory][page]){
          setContent(stateData.blogContext[currentBlogCategory][page])         
        } else {
          setLoading(true)
          fetchInitialData(false, realPath)
            .then((response) => {
              setContent(response.blogBackendContent)
              setLoading(false) 
              stateData.blogCountsContext[currentBlogCategory] = response.blogBackendCount;
              stateData.blogContext[currentBlogCategory][page] = response.blogBackendContent;
              stateData.contextSEO.[pathname] = response.backendSEO;
              dispatchData({
                  type: "FETCH_BLOG",
                  payload: stateData.blogContext
              }) 
            })
        }
      } else {
        fetchNewContent.current = true
      }
    }, [fetchNewContent,stateData, dispatchData, pathname])

    let paginateLinks = [];



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
                                   
                <Aboutnav h1={'Новости'}/>
                <div className={classes.news}> 
                    {(() => {
                        if (loading === true) {
                            return <Loading />
                        }
                        if(content.length){
                            return (
                                <>
                                    {
                                        content.map((el, index) => {
                                            return ( 
                                                <Link to={"/blog/" + el.url} className={classes.news__element} key={index}>
                                                    <div className={classes.news__ava}>
                                                        <img className={classes.news__image} src={el.preview_img ? el.preview_img : '/storage/irs.jpg'} alt="ava" width="360" height="360" loading="lazy" />
                                                    </div>
                                                    <div className={classes.news__date}>{el.date}</div>
                                                    <div className={classes.news__title}>{el.title}</div>
                                                </Link>
                                            )
                                        })
                                    }
                                    {(()=>{
                                        for (let i = 1; i <= Math.ceil(stateData.blogCountsContext[currentBlogCategory] / 18); i++) {
                                            let paginationCategory = currentBlogCategory + "/";
                                            if(currentBlogCategory === 'all') paginationCategory = "";
                                            let pageLink = '/blog/'+paginationCategory+'page/'+i;
                                            if(i === 1) {
                                                pageLink = '/blog/'+currentBlogCategory;
                                                if(currentBlogCategory === 'all') pageLink = '/blog';
                                            }
                                            let linkClass = "";
                                            if(i === Number(currentPage)) linkClass = classes.pagination__current;
                                            if(!currentPage || currentPage < 5){
                                                if(i === Math.ceil(stateData.blogCountsContext[currentBlogCategory] / 18) && Math.ceil(stateData.blogCountsContext[currentBlogCategory] / 18) > 4){
                                                    paginateLinks.push(<div className={classes.pagination__dots}>...</div>)
                                                }
                                                if(i <= 5 || i === Math.ceil(stateData.blogCountsContext[currentBlogCategory] / 18)){
                                                    paginateLinks.push(<Link className={classes.pagination__link+" "+linkClass} to={pageLink}>{i}</Link>)
                                                } 
                                            } else if(currentPage > Math.ceil(stateData.blogCountsContext[currentBlogCategory] / 18) - 4){
                                                if(i === 1 || i >= Math.ceil(stateData.blogCountsContext[currentBlogCategory] / 18) - 4){
                                                    paginateLinks.push(<Link className={classes.pagination__link+" "+linkClass} to={pageLink}>{i}</Link>)
                                                }
                                                if(i === 1){
                                                    paginateLinks.push(<div className={classes.pagination__dots}>...</div>)   
                                                }
                                            } else {
                                                if(i === Math.ceil(stateData.blogCountsContext[currentBlogCategory] / 18)){
                                                    paginateLinks.push(<div className={classes.pagination__dots}>...</div>)
                                                }
                                                if(i === 1 || i === Math.ceil(stateData.blogCountsContext[currentBlogCategory] / 18) || Math.abs(currentPage - i) <=1  ){
                                                    paginateLinks.push(<Link className={classes.pagination__link+" "+linkClass} to={pageLink}>{i}</Link>)
                                                } 
                                                if(i === 1){
                                                    paginateLinks.push(<div className={classes.pagination__dots}>...</div>) 
                                                }
                                            }
                                            
                                        }  
                                        if(paginateLinks.length > 1){
                                            return(
                                                <div className={classes.pagination}>
                                                    {
                                                        paginateLinks.map((el, ind) => {
                                                            return el
                                                        })
                                                    }
                                                </div>
                                            )
                                        }
                                    })()}
                                    
                                </>
                            )
                        } 
                        return <p>404 ошибка страницы</p>
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