<template>
  <div class="page">
    <div class="page_header clearfix page_margin_top">
      <div class="page_header_left">
        <h1 class="page_title">About Us</h1>
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
        <div class="column column_1_2">
          <img class="responsive pr_preload" src='/static/images/samples/510x374/image_09.jpg' alt='img'>
        </div>
        <div class="column column_1_2">
          <h1 class="about_title">Top Stories from</h1>
          <h2 class="about_subtitle">Around the World</h2>
          <h3 class="page_margin_top">Politicians have looked weak in the face of such natural disaster, with many facing criticism from local.</h3>
          <p class="text padding_top_0 page_margin_top">Politicians have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as “flood tourists” at the site of disasters, incapable of helping those in crisis and only there for a photo.</p>
        </div>
      </div>
      <div class="row page_margin_top_section">
        <div class="column column_1_3 border_top">
          <ul class="page_margin_top">
            <li class="item_content clearfix">
              <span title="Engaging Oppurtunities" class="features_icon printer animated_element animation-scale">
              </span>
              <div class="text">
                <h3>Engaging Oppurtunities</h3>
                <p>Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios nulla.</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="column column_1_3 border_top">
          <ul class="page_margin_top">
            <li class="item_content clearfix">
              <span title="Source of Daily News" class="features_icon calendar animated_element animation-scale">
              </span>
              <div class="text">
                <h3>Source of Daily News</h3>
                <p>Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios nulla.</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="column column_1_3 border_top">
          <ul class="page_margin_top">
            <li class="item_content clearfix">
              <span title="Rankings and Ratings" class="features_icon graph animated_element animation-scale">
              </span>
              <div class="text">
                <h3>Rankings and Ratings</h3>
                <p>Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios nulla.</p>
              </div>
            </li>
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
