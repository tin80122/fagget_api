<template>
  <div class="wrapper has-sidebar" :class="{'sidebar-collapse': !getMenuTrigger, 'sidebar-open': getMenuTrigger}">
    <main-header></main-header>
    <aside class="main-sidebar">
      <main-menu></main-menu>
    </aside>
    <div class="content-wrapper">
      <content-header></content-header>
      <section class="content">
        <router-view></router-view>
      </section>
    </div>
    <main-footer></main-footer>
    <cover v-if="getMenuTrigger"></cover>
  </div>
</template>

<script>
  import {mapGetters} from 'vuex'
  import Footer from 'components/Footer'
  import Header from 'components/Header'
  import Menu from 'components/Menu'
  import Cover from 'components/Cover'
  import ContentHeader from 'components/Content-Header'
  export default {
    components: {
      'main-header': Header,
      'main-menu': Menu,
      Cover,
      'main-footer': Footer,
      ContentHeader
    },
    data () {
      return {

      }
    },
    computed: {
      ...mapGetters([
        'getMenuTrigger'
      ])
    }
  }
</script>
