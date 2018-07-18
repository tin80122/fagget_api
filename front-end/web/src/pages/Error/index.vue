<template>
  <div class="page">
    <div class="page_header clearfix page_margin_top">
      <div class="page_header_left">
        <h1 class="page_title">Error 404</h1>
      </div>
      <div class="page_header_right">
        <breadcrumb></breadcrumb>
      </div>
    </div>
    <div class="page_layout clearfix">
      <div class="divider_block clearfix">
        <hr class="divider first">
        <hr class="divider subheader_arrow">
        <hr class="divider last">
      </div>
      <div class="row page_margin_top">
        <div class="column column_3_3">
          <div class="item_content clearfix">
            <span class="features_icon not_found animated_element animation-scale"></span>
            <div class="text">
              <h1 class="about_title">Page</h1>
              <h1 class="about_subtitle">Not Found</h1>
            </div>
          </div>
          <h3 class="page_margin_top">We're sorry but we can't seem find the page you requested.<br>This might be because you have typed the web address incorrectly.</h3>
          <p class="padding_top_30">In the meantime, try one of options listed below:</p>
          <h3 class="margin_top_20">Go To Page:</h3>
          <ul class="list no_border indent spacing">
            <li class="bullet style_2"><a title="Home" href="home.html">Home Page</a></li>
            <li class="bullet style_2"><a title="Blog" href="blog.html">Blog</a></li>
            <li class="bullet style_2"><a title="Contact" href="contact.html">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Breadcrumb from 'components/Breadcrumb'
  export default {
    components: {
      Breadcrumb
    },
    data () {
      return {

      }
    }
  }
</script>
