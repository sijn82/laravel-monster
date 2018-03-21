// I am guessing at this point but I've seen some examples where a file like this,
// is used to connect the components to routes using a file located here.

// An alternative to this is to add it to app.js within
// const routes [{
//      name: 'Navbar'
//      path: '/'
//      component: Navbar
// }].
// The correct approach may be dependant on preference and scale of project.

import VueRouter from 'vue-router';

// import Monsters from './components/Monsters.vue';

let routes = [

    {
        path:'/',
        component: require('./components/Parallax.vue')
    },
    {
        path:'api/monsters/{id}',
        component: require('./components/MonsterSolo.vue')
    },
    {
        path:'/monsters',
        // component: Monsters
        component: require('./components/Monsters.vue')

    },
    {
        path:'/monsters/new',
        component: require('./components/NewMonster.vue')
    },
    {
        path:'/coming-soon',
        component: require('./components/ComingSoon.vue')
    },
    {
        path:'/dashboard',
        // component: require('./components/passport/PersonalAccessTokens.vue')
    }
];

export default new VueRouter({
    routes,
    mode: 'history'
})