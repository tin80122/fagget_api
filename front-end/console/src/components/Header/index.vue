<template>
  <header class="main-header">
    <button type="button" class="btn btn-side-toggle" data-toggle="offcanvas" @click.stop="setMenuActive(!getMenuTrigger)"></button>
    <div class="main-title"><router-link to="/"><span>Fagget</span>後台管理系統</router-link></div>
    <router-link to="/login" class="btn btn-logout"><i class="fa fa-sign-out"></i> 登出</router-link>
  </header>
</template>

<script>
  import {mapMutations, mapGetters} from 'vuex'
  export default {
    data () {
      return {

      }
    },
    methods: {
      ...mapMutations({
        setMenuActive: 'TRIGGER_MENU'
      })
    },
    computed: {
      ...mapGetters([
        'getMenuTrigger'
      ])
    }
  }
</script>

