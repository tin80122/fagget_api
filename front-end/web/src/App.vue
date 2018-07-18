<template>
  <div class="site_container">
    <header-top></header-top>
    <main-header></main-header>
    <main-menu></main-menu>
    <mobile-menu></mobile-menu>
    <router-view/>
    <main-footer></main-footer>
    <cover v-if="getMobileMenuTrigger"></cover>
  </div>
</template>

<script>
  import {mapGetters} from 'vuex'
  import HeaderTop from 'components/HeaderTop'
  import Header from 'components/Header'
  import Menu from 'components/Menu'
  import MobileMenu from 'components/Menu/MobileMenu'
  import Footer from 'components/Footer'
  import Cover from 'components/Cover'
  export default {
    name: 'App',
    components: {
      'main-header': Header,
      'main-menu': Menu,
      MobileMenu,
      HeaderTop,
      Cover,
      'main-footer': Footer
    },
    computed: {
      ...mapGetters([
        'getMobileMenuTrigger'
      ])
    }
  }
</script>

<style lang="sass">
  @import 'assets/sass/style'
</style>
