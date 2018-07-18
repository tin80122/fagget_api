<template>
  <section class="sidebar-nav">
    <div class="user-panel">
      <div class="user-logout">登入帳號：</div>
      <div class="user-type">stanley823@gmail.com</div>
    </div>
    <ul class="sidebar-menu">
      <li v-for="(item, index) in menu" :key="index">
        <a href="javascript:;" @click.stop="goto(item.url)">
          <i :class="item.icon"></i><span>{{item.name}}</span>
        </a>
      </li>
    </ul>
  </section>
</template>

<script>
  import {mapMutations} from 'vuex'
  export default {
    data () {
      return {
        menu: [
          {
            name: '會員資訊',
            url: '/memberInfo',
            icon: 'fa fa-user'
          },
          {
            name: '類別管理',
            url: '/category',
            icon: 'fa fa-tags'
          },
          {
            name: '文章管理',
            url: '/article',
            icon: 'fa fa-pencil-square-o'
          }
        ]
      }
    },
    methods: {
      goto(path) {
        this.$router.push(path)
        this.setMenuActive(false)
      },
      ...mapMutations({
        setMenuActive: 'TRIGGER_MENU'
      })
    }
  }
</script>
