import Vue from 'vue'
import Router from 'vue-router'
import Login from 'pages/Login/index.vue'
import Main from 'components/Layout/index.vue'
import MemberInfo from 'pages/MemberInfo/index.vue'
import ArticleList from 'pages/Article-List/index.vue'
import Article from 'pages/Article/index.vue'
import Category from 'pages/Category/index.vue'
import ErrorArea from 'pages/Error/index.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/',
      name: 'Layout',
      component: Main,
      children: [
        {
          path: '/memberInfo',
          component: MemberInfo
        },
        {
          path: '/category',
          component: Category
        },
        {
          path: '/article',
          component: ArticleList
        },
        {
          path: '/article/:category/:id',
          component: Article
        },
        {
          path: '/404',
          name: 'Error',
          component: ErrorArea
        }
      ]
    },
    {
      path: '*',
      redirect: {
        name: 'Error'
      }
    }
  ],
  scrollBehavior (to, from, savedPosition) {
    return { x: 0, y: 0 }
  }
})
