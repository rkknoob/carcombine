Vue.use(VueRouter)

import Vue             from 'vue'
import VueRouter       from 'vue-router';
import Home            from './pages/Home'
import Category        from './pages/Category';
import Category_Index  from './pages/category/Category_Index';
import Category_Detail from './pages/category/Category_Detail';
import Blog            from './pages/Blog';
import Contact         from './pages/Contact';
import NotFound        from './pages/NotFound';

const routes = [
    { path: "*",          component: NotFound , name: 'not_found'},
    { path: '/',          component: Home     , name: 'index'    },
    { path: '/home',      redirect: '/'       , name: 'home'     },
    { path: '/inventory', component: Category,
        children : [
            { path: '/',     component: Category_Index  , name: 'category_index'    },
            { path: ':type', component: Category_Index  , name: 'category_category' },
            { path: '/detail/:id',   component: Category_Detail , name: 'category_detail'   },
        ]
    },
    { path: '/blog',     component: Blog     , name: 'blog'     },
    { path: '/contact',  component: Contact  , name: 'contact'  },
];

const Router = new VueRouter({
    routes,
    mode: 'history',
    // linkExactActiveClass: 'is-active',
});

export default Router
