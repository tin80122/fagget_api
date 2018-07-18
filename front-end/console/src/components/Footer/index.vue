<template>
  <footer class="main-footer sticky-bottom">
    <div class="inner">版權所有 &copy; {{years}} <a href="##" target="_blank">Fagget</a> 保留一切權利
    </div>
  </footer>
</template>

<script>
  export default {
    data () {
      return {

      }
    },
    computed: {
      years() {
        return new Date().getFullYear()
      }
    }
  }
</script>
