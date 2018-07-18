<template>
  <nav class="mobile-nav" :class="{'active': getMobileMenuTrigger}">
    <ul>
      <li v-for="(item, index) in menu" :key="index">
        <a v-if="!item.child" @click.stop="goTo(item.path)" class="no-child">{{item.name}}</a>
        <p v-else :title="item.name" class="has-child" :class="{'child-active': item.active}" @click.stop="childTrigger(index)">{{item.name}}</p>
        <transition name="slide">
          <ul v-if="item.active && item.child">
            <li v-for="(child, index) in item.child" :key="index" >
              <a @click.stop="goTo(child.path)" :title="child.name">
                {{child.name}}
              </a>
            </li>
          </ul>
        </transition>
      </li>
    </ul>
  </nav>
</template>

<script>
  import {mapMutations, mapGetters} from 'vuex'
  export default {
    data () {
      return {
        menu: [
          {
            name: '關於我們',
            path: '/about'
          },
          {
            name: '最新消息',
            active: false,
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
            active: false,
            child: [
              {
                name: 'LGBTQQIAA',
                path: '/learn/LGBTQQIAA'
              }
            ]
          },
          {
            name: '同志怎麼教',
            active: false,
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
            active: false,
            child: [
              {
                name: '給護家盟的69堂課',
                path: '/activity/taiwanfamily'
              }
            ]
          }
        ]
      }
    },
    methods: {
      goTo(path) {
        this.$router.push(path)
        this.setMenuActive(false)
      },
      childTrigger(index) {
        this.menu[index].active = !this.menu[index].active
      },
      ...mapMutations({
        setMenuActive: 'TRIGGER_MOBILE_MENU'
      })
    },
    computed: {
      ...mapGetters([
        'getMobileMenuTrigger'
      ])
    }
  }
</script>

<style>
  .slide-enter-active, .slide-leave-active {
    transition: .3s;
    transform: translateY(0);
    opacity: 1;
  }
  .slide-enter, .slide-leave-to {
    transform: translateY(-10%);
    transition: .2s;
    opacity: 0;
  }
</style>

