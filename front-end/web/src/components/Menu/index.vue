<template>
  <div class="menu_container clearfix">
    <nav>
      <ul class="sf-menu">
        <li class="submenu" v-for="(item, index) in menu" :key="index">
          <router-link v-if="!item.child" :to="item.path" class="no-child">{{item.name}}</router-link>
          <router-link v-else :to="item.child[0].path" :title="item.name">{{item.name}}</router-link>
          <ul v-if="item.child">
            <li v-for="(child, index) in item.child" :key="index">
              <router-link :to="child.path" :title="child.name">
                {{child.name}}
              </router-link>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        menu: [
          {
            name: '關於我們',
            path: '/about'
          },
          {
            name: '最新消息',
            child: [
              {
                name: '活動快訊',
                path: '/news/event'
              },
              {
                name: 'NGO新聞稿',
                path: '/news/ngo'
              }
            ]
          },
          {
            name: '搞懂同志',
            child: [
              {
                name: 'LGBTQQIAA',
                path: '/learn/LGBTQQIAA'
              }
            ]
          },
          {
            name: '同志怎麼教',
            child: [
              {
                name: '國文',
                path: '/teach/chiness'
              },
              {
                name: '地理',
                path: '/teach/geography'
              }
            ]
          },
          {
            name: '特別活動',
            child: [
              {
                name: '給護家盟的69堂課',
                path: '/activity/taiwanfamily'
              }
            ]
          }
        ]
      }
    }
  }
</script>

