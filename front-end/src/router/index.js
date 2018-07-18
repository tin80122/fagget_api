import Vue from 'vue'
import Router from 'vue-router'
import Home from 'pages/Home/index.vue'
import About from 'pages/About/index.vue'
import Search from 'pages/Search/index.vue'
import ArticleList from 'pages/Article-List/index.vue'
import Article from 'pages/Article/index.vue'
import ErrorArea from 'pages/Error/index.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/about',
      name: 'About',
      component: About
    },
    {
      path: '/news/:category',
      name: 'News',
      component: ArticleList
    },
    {
      path: '/news/:category/:id',
      name: 'NewsDetail',
      component: Article
    },
    {
      path: '/teach/:category',
      name: 'Teach',
      component: ArticleList
    },
    {
      path: '/teach/:category/:id',
      name: 'TeachDetail',
      component: Article
    },
    {
      path: '/learn/:category',
      name: 'Learn',
      component: ArticleList
    },
    {
      path: '/learn/:category/:id',
      name: 'LearnDetail',
      component: Article
    },
    {
      path: '/activity/:category',
      name: 'Activity',
      component: ArticleList
    },
    {
      path: '/activity/:category/:id',
      name: 'ActivityDetail',
      component: Article
    },
    {
      path: '/search',
      name: 'Search',
      component: Search
    },
    {
      path: '*',
      component: ErrorArea,
      keepAlive: true
    }
  ],
  scrollBehavior (to, from, savedPosition) {
    return { x: 0, y: 0 }
  }
})
