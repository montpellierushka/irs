import fetch from 'isomorphic-fetch'   
import Env from './env'

export function fetchMain (menu = false, path = false) {

  let link = Env.backend+`?page=main`
  if(menu){
    link += '&menu='+menu
  }
  const encodedURI = encodeURI(link)

  return fetch(encodedURI)
    .then((data) => data.json())
    .then((repos) => repos)
    .catch((error) => {
      console.warn(error)
      return null
    });

}


export function fetchRules (menu = false, path = false) {

  let link = Env.backend+`rules`
  if(menu){
    link += '?menu='+menu
  }
  const encodedURI = encodeURI(link)

  return fetch(encodedURI)
    .then((data) => data.json())
    .then((repos) => repos)
    .catch((error) => {
      console.warn(error)
      return null
    });

}


export function fetchTeam (menu = false, path = false) {

  let link = Env.backend+`?page=team`
  if(menu){
    link += '&menu='+menu
  }
  const encodedURI = encodeURI(link)

  return fetch(encodedURI)
    .then((data) => data.json())
    .then((repos) => repos)
    .catch((error) => {
      console.warn(error)
      return null
    });

}


export function fetchAbout (menu = false, path = false) {

  let link = Env.backend+`?page=about`
  if(menu){
    link += '&menu='+menu
  }
  const encodedURI = encodeURI(link)

  return fetch(encodedURI)
    .then((data) => data.json())
    .then((repos) => repos)
    .catch((error) => {
      console.warn(error)
      return null
    });

}

export function fetchPage(menu = false, path = false) {

  let link = Env.backend
  if(menu){
    link += '?menu='+menu
  }
  const encodedURI = encodeURI(link) 

  return fetch(encodedURI)
    .then((data) => data.json())
    .then((repos) => repos)
    .catch((error) => {
      console.warn(error)
      return null
    });

} 

export function fetchPageContent (menu = false, path = false) {

  let link = Env.backendMini+path
  if(menu){
    link += '?menu='+menu
  }
  const encodedURI = encodeURI(link)

  return fetch(encodedURI)
    .then((data) => data.json())
    .then((repos) => repos)
    .catch((error) => {
      console.warn(error)
      return null
    });

} 

export function fetchBlogContent (menu = false, path = false) {

  let link = Env.backendMini+path
  let linkGetParamSeparator = "?";
  if(link.includes('?')){
    linkGetParamSeparator = "&";
  }
  if(menu){
    link += linkGetParamSeparator+'menu='+menu
  } 
  const encodedURI = encodeURI(link)

  return fetch(encodedURI)
    .then((data) => data.json())
    .then((repos) => repos)
    .catch((error) => {
      console.warn(error)
      return null
    });

}