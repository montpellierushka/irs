import express from 'express'
import cors from 'cors'
import * as React from 'react'
import ReactDOM from 'react-dom/server'
import { matchPath } from 'react-router-dom'
import { StaticRouter } from 'react-router-dom/server';
import serialize from 'serialize-javascript'
import App from '../shared/App'
import routes from '../shared/routes'
import {Helmet} from "react-helmet";

const dotenv = require('dotenv');
const env = dotenv.config().parsed;

const app = express()


app.use(cors())
app.use(express.static('dist'))

app.get('*', (req, res, next) => {

  if(req.url.startsWith('/?')){
    req.url = '/';
  } 

  const activeRoute = routes.find((route) => matchPath(route.path, req.url)) || {}

  let fetchPath = req.path;

  if(
      fetchPath.startsWith('/login') || fetchPath.startsWith('/logout') || fetchPath.startsWith('/admin') 
      || fetchPath.startsWith('/upload') || fetchPath.startsWith('/storage') || fetchPath.startsWith('/adminlte') || fetchPath.startsWith('/js') || fetchPath.startsWith('/css') // 403 nginx
    ){
    fetchPath = '/404';
  } 


  if(fetchPath.startsWith('/blog/articles')){
    fetchPath = fetchPath.replace('/articles', '')+"?category=articles";
  }
  if(fetchPath.startsWith('/blog/news')){
    fetchPath = fetchPath.replace('/news', '')+"?category=news";
  }
  if(fetchPath.startsWith('/blog/sales')){
    fetchPath = fetchPath.replace('/sales', '')+"?category=sales";
  }
  if(fetchPath.startsWith('/blog/education')){
    fetchPath = fetchPath.replace('/education', '')+"?category=education";
  }

  const promise = activeRoute.fetchInitialData
    ? activeRoute.fetchInitialData('main', fetchPath)
    : Promise.resolve()

  promise.then((data) => {

    const markup = ReactDOM.renderToString(
      <StaticRouter location={req.url} >
        <App serverData={data} />
      </StaticRouter>
    )

    let status = 200;
    if(data.status === '404'){
      status = 404;
    }

    const helmet = Helmet.renderStatic();

    res.status(status).send(`<!DOCTYPE html>
<html lang="ru-RU">
  <head>    
    <meta charset="utf-8" />
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    
    <link rel="apple-touch-icon" href="/logo192.png" />

    <link rel="preload" href="/fonts/TTNorms-Regular.woff2" as="font" crossorigin="anonymous">
    <link rel="preload" href="/fonts/TTNorms-Medium.woff2" as="font" crossorigin="anonymous">
    <link rel="preload" href="/fonts/TTNorms-Bold.woff2" as="font" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style> 
        @font-face {
            font-family: 'TTNorms';
            src: url("/fonts/TTNorms-Regular.woff2") format('woff2'),
                 url("/fonts/TTNorms-Regular.woff") format('woff');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'TTNorms';
            src: url("/fonts/TTNorms-Medium.woff2") format('woff2'),
                 url("/fonts/TTNorms-Medium.woff") format('woff');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'TTNorms';
            src: url("/fonts/TTNorms-Bold.woff2") format('woff2'),
                 url("/fonts/TTNorms-Bold.woff") format('woff');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        } 
    </style>

    ${helmet.title.toString()}
    ${helmet.meta.toString()}
    ${helmet.link.toString()}

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/bundle.js" defer></script>
    <link href="/main.css" rel="stylesheet">
    <script>window.__INITIAL_DATA__ = ${serialize(data)}</script>
    <script>window.__INITIAL_PATH__ = "${req.path}"</script>
  </head>

  <body>
    <div id="app">${markup}</div>
  </body>
</html>
    `)
  }).catch(next)
})

const PORT = process.env.PORT || 3000

app.listen(PORT, 'localhost', () => {
  console.log(`Сервер запущен on port: ${PORT}`)
})