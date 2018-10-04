/*
	MAIN COMPONENTS
*/
import Dashboard from './components/main/Dashboard';

/*
	CHARGES COMPONENTS
*/
import charges from './components/charges/index';
/*
	RECEIPT COMPONENTS
*/
import receipt from './components/receipt/index';

export const routes = [
  {
    path:'/',
    component:Dashboard,
  },
  {
    path:'/charges',
    component:charges,
  },
  {
    path:'/receipt',
    component:receipt,
  }


];

// export default routes