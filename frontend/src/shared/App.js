import * as React from 'react'
import routes from './routes'
import { useLocation, Route, Routes, Link } from 'react-router-dom'


import './style.module.scss'

import ContextData from './context/Data/ContextData';
import ReducerData from './context/Data/ReducerData';
import StateData from './context/Data/StateData';
 

import Menu from './modules/Menu/Menu'  
import Sidebar from './routes/Main/Sidebar/Sidebar' 
import {Helmet} from "react-helmet";

export default function App ({ serverData=null }) {
    const [stateData, dispatchData] = React.useReducer(ReducerData, StateData)
    const location = useLocation();
    React.useEffect(() => { 
        window.scrollTo(0, 0)
    }, [location]);
    

    if(!__isBrowser__){
        if(!stateData.contextSEO[location.pathname]){
          stateData.contextSEO[location.pathname] = serverData.backendSEO; 
        }
    }

  return (
    <React.Fragment>
      <ContextData.Provider value={{stateData, dispatchData}}> 

        <Helmet>       
          <meta name="description" content={stateData.contextSEO?.[location.pathname]?.description} />
          <title>{stateData.contextSEO?.[location.pathname]?.title}</title>
        </Helmet> 

        <Menu serverData={serverData} />
        <Sidebar serverData={serverData} />

        <Routes>
          {routes.map(({ path, fetchInitialData, component: C }) => (
            <Route
              key={path}
              path={path}
              element={<C serverData={serverData} fetchInitialData={fetchInitialData} />}
            />
          ))} 
        </Routes>
      </ContextData.Provider>
    </React.Fragment>
  )
}