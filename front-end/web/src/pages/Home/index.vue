<template>
  <div class="page">
    <div class="page_layout page_margin_top clearfix">
      <banner></banner>
      <div class="row page_margin_top">
        <last-posts></last-posts>
        <section-first></section-first>
        <section-second></section-second>
      </div>
    </div>
  </div>
</template>

<script>
import Banner from './subpage/banner'
import LastPosts from './subpage/lastPosts/'
import SectionFirst from './subpage/sectionFirst/'
import SectionSecond from './subpage/sectionSecond/'
export default {
  name: 'Home',
  components: {
    Banner,
    LastPosts,
    SectionFirst,
    SectionSecond
  },
  data () {
    return {
    }
  },
  created() {
  }
}
</script>

