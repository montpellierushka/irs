import { fetchMain, fetchPageContent, fetchPage, fetchTeam, fetchAbout, fetchRules, fetchBlogContent } from './api' 

import Main from './routes/Main/Main'; 
import Blog from './routes/Blog/Blog';
import BlogDetail from './routes/Blog/BlogDetail';
import Page from './routes/Page/Page';
import Services from './routes/Services/Services'; 
import Map from './modules/Map/Map'
import About from './routes/About/About';
import Portfolio from './routes/Portfolio/Portfolio';
import Rules from './routes/About/Rules/Rules';
import Socseti from './routes/About/Social/Social';
import Team from './routes/Team/Team';
import Vacancies from './routes/Vacancies/Vacancies';
import ServicesDetail from './routes/Services/ServiceDetail';

const routes =  [ 
  {
    path: '/',
    component: Main,
    fetchInitialData: (menu = false, path = false) => fetchMain(menu,path)
  }, 
  {
    path: '/services',
    component: Services,
    fetchInitialData: (menu = false, path = false) => fetchPageContent(menu,path)
  },
  {
    path: '/services/:detail',
    component: ServicesDetail,
    fetchInitialData: (menu = false, path = false) => fetchPageContent(menu,path)
  },
  {
    path: '/portfolio',
    component: Portfolio,
    fetchInitialData: (menu = false, path = false) => fetchPage(menu,path)
  },
  {
    path: '/portfolio/:detail',
    component: Portfolio,
    fetchInitialData: (menu = false, path = false) => fetchPage(menu,path)
  },
  {
    path: '/contacts',
    component: Map,
    fetchInitialData: (menu = false, path = false) => fetchPage(menu,path)
  },
  {
    path: '/team',
    component: Team,
    fetchInitialData: (menu = false, path = false) => fetchTeam(menu,path)
  },
  {
    path: '/about',
    component: About,
    fetchInitialData: (menu = false, path = false) => fetchAbout(menu,path)
  },
  {
    path: '/about/rules',
    component: Rules,
    fetchInitialData: (menu = false, path = false) => fetchRules(menu,path)
  },
  {
    path: '/about/social',
    component: Socseti,
    fetchInitialData: (menu = false, path = false) => fetchPage(menu,path)
  },
  {
    path: '/blog',
    component: Blog,
    fetchInitialData: (menu = false, path = false) => fetchBlogContent(menu,path)
  },
  {
    path: '/blog/page/:currentPage',
    component: Blog,
    fetchInitialData: (menu = false, path = false) => fetchBlogContent(menu,path)
  },
  {
    path: '/blog/articles',
    component: Blog,
    fetchInitialData: (menu = false, path = false) => fetchBlogContent(menu,path)
  },
  {
    path: '/blog/articles/page/:currentPage',
    component: Blog,
    fetchInitialData: (menu = false, path = false) => fetchBlogContent(menu,path)
  },
  {
    path: '/blog/news',
    component: Blog,
    fetchInitialData: (menu = false, path = false) => fetchBlogContent(menu,path)
  },
  {
    path: '/blog/news/page/:currentPage',
    component: Blog,
    fetchInitialData: (menu = false, path = false) => fetchBlogContent(menu,path)
  },
  {
    path: '/blog/sales',
    component: Blog,
    fetchInitialData: (menu = false, path = false) => fetchBlogContent(menu,path)
  },
  {
    path: '/blog/sales/page/:currentPage',
    component: Blog,
    fetchInitialData: (menu = false, path = false) => fetchBlogContent(menu,path)
  },
  {
    path: '/blog/education',
    component: Blog,
    fetchInitialData: (menu = false, path = false) => fetchBlogContent(menu,path)
  },
  {
    path: '/blog/education/page/:currentPage',
    component: Blog,
    fetchInitialData: (menu = false, path = false) => fetchBlogContent(menu,path)
  },
  {
    path: '/blog/:detail',
    component: BlogDetail,
    fetchInitialData: (menu = false, path = false) => fetchPageContent(menu,path)
  },
  {
    path: '/vacancies',
    component: Vacancies,
    fetchInitialData: (menu = false, path = false) => fetchPageContent(menu,path)
  },
  {
    path: '/vacancies/:detail',
    component: Page,
    fetchInitialData: (menu = false, path = false) => fetchPageContent(menu,path)
  },
  {
    path: '*',
    component: Page,
    fetchInitialData: (menu = false, path = false) => fetchPageContent(menu,path)
  }
]

export default routes

 