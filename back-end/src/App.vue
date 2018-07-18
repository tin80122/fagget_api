<template>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>
  export default {
    name: 'App',
    components: {
    },
    computed: {
    },
    created () {
      setTimeout(() => {
      }, 20)
    }
  }
</script>

<style lang="sass">
  @import 'assets/sass/style'
</style>
