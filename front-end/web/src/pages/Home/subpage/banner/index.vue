<template>
  <div class="row">
    <div class="column column_1_1">
      <div class="blog_grid">
        <div class="grid_view">
          <div class="row">
            <div class="column">
              <div class="post large">
                <router-link to="/news/type/123123" title="異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思">
                  <img src='/static/images/samples/787x524/image_08.jpg' alt='img'>
                </router-link>
                <div class="slider_content_box">
                  <ul class="post_details simple">
                    <li class="category"><router-link title="最新消息" to="/news/type">最新消息</router-link></li>
                  </ul>
                  <h2><router-link to="/news/type/123123" title="異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思">異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思</router-link></h2>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="row">
                <div class="post small">
                  <router-link to="/learn/lgbtqqiaa/123123123" title="異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思">
                    <span class="icon gallery"></span>
                    <img src='/static/images/samples/524x524/image_01.jpg' alt='img'>
                  </router-link>
                  <div class="slider_content_box">
                    <ul class="post_details simple">
                      <li class="category"><router-link title="搞懂同志" to="/learn/lgbtqqiaa">搞懂同志</router-link></li>
                    </ul>
                    <h5><router-link to="/learn/lgbtqqiaa/123123123" title="異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思">異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思</router-link></h5>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="post small">
                  <router-link to="/teach/chinese/123123" title="異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思">
                    <img src='/static/images/samples/524x524/image_12.jpg' alt='img'>
                  </router-link>
                  <div class="slider_content_box">
                    <ul class="post_details simple">
                      <li class="category"><router-link title="同志怎麼教" to="/learn/lgbtqqiaa">同志怎麼教</router-link></li>
                    </ul>
                    <h5><router-link to="/learn/lgbtqqiaa/123123123" title="異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思">異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思</router-link></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="slider_view">
          <slick class="slick-banner" ref="slickBanner" :options="slickOptions">
            <div v-for="(item, index) in slider">
              <a href="javascript:;" @click.stop="goto(item.url)" :title="item.title">
                <figure><img :src="item.img" :alt="item.title"></figure>
                <div class="banner-info">
                  <span>{{item.cat.name}}</span>
                  <span class="time">{{item.time}}</span>
                  <p>{{item.title}}</p>
                </div>
              </a>
              <a href="javascript:;" @click.stop="goto(item.url)" :title="item.title" class="mobile-title">{{item.title}}</a>
            </div>
          </slick>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import 'slick-carousel/slick/slick.css'
  import Slick from 'vue-slick'
  export default {
    components: {
      Slick
    },
    data () {
      return {
        slider: [
          {
            cat: {
              name: '最新消息',
              value: 'news'
            },
            img: '/static/images/samples/690x450/image_08.jpg',
            title: '異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思',
            url: '/news/type/123123',
            time: '2018/10/23 10:11'
          },
          {
            cat: {
              name: '搞懂同志',
              value: 'learn'
            },
            img: '/static/images/samples/690x450/image_01.jpg',
            title: '異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思',
            url: '/learn/lgbtqqiaa/123123',
            time: '2018/10/23 10:11'
          },
          {
            cat: {
              name: '同志怎麼教',
              value: 'teach'
            },
            img: '/static/images/samples/690x450/image_12.jpg',
            title: '異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思',
            url: '/teach/chinese/123123',
            time: '2018/10/23 10:11'
          }
        ],
        slickOptions: {
          autoplay: false,
          infinite: true,
          slidesToShow: 1,
          adaptiveHeight: true,
          prevArrow: `<button type="button" class="slick-banner-prev"></button>`,
          nextArrow: `<button type="button" class="slick-banner-next"></button>`
        }
      }
    },
    methods: {
      goto(path) {
        this.$router.push(path)
      }
    }
  }
</script>

