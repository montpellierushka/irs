const ReducerData = (state, action) => {
    switch (action.type) { 
        case "FETCH_MAIN": 
            return{
                ...state,
                main: action.payload
            } 
        case "FETCH_TEAM": 
            return{
                ...state,
                contextTeam: action.payload
            }  
        case "FETCH_ABOUT": 
            return{
                ...state,
                contextAbout: action.payload
            } 
        case "FETCH_PAGES": 
            return{
                ...state,
                pagesContext: action.payload
            }
        case "FETCH_BLOG": 
            return{
                ...state,
                blogContext: action.payload
            }
        case "FETCH_BLOG_DETAIL": 
            return{
                ...state,
                blogDetailsContext: action.payload
            }
        case "FETCH_SERVICES": 
            return{
                ...state,
                servicesContext: action.payload
            }
        case "FETCH_SERVICES_DETAIL": 
            return{
                ...state,
                servicesDetailContext: action.payload
            }

 

        default:
            return state
    }
}

export default ReducerData