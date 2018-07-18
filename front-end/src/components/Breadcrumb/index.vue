<template>
  <ul class="bread_crumb">
    <li>
      <a title="Home" href="home.html">
        Home
      </a>
    </li>
    <li class="separator icon_small_arrow right_gray">
      &nbsp;
    </li>
    <li>
      Pages
    </li>
    <li class="separator icon_small_arrow right_gray">
      &nbsp;
    </li>
    <li>
      Search Results
    </li>
  </ul>
</template>


<script>
export default {
  data () {
    return {
      breadcrumb: []
    }
  },
  watch: {
    '$route': 'getTitle'
  },
  methods: {
    getTitle() {
      this.breadcrumb = [{name: '首頁', path: '/'}]
      console.log(this.$route)
    }
  },
  created () {
    setTimeout(() => {
      this.getTitle()
    }, 20)
  }
}
</script>
