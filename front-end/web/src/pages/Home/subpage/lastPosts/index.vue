<template>
  <div class="row">
    <div class="column column_1_1">
      <h4 class="box_header">Last Posts</h4>
      <div @mouseover.stop="mouseOver" @mouseleave.stop="mouseLeave">
        <slick ref="slick" :options="slickOptions" class="slick-last-posts">
          <figure v-for="(item, index) in slider" :key="index">
            <a href="javascript:;" @click.stop="goto(item.url)" :title="item.title">
              <img :src="item.img" alt="img">
              <p v-html="limitTitle(item.title)"></p>
            </a>
            <div>
              <router-link :to="'/search?' + item.cat.value" class="post-cat">{{item.cat.name}}</router-link>
              <span class="post-time">{{item.time}}</span>
            </div>
          </figure>
        </slick>
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
    data() {
      return {
        slider: [
          {
            img: '/static/images/samples/330x242/image_04.jpg',
            title: '異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思',
            url: '/news/type/123123',
            cat: {
              name: '最新消息',
              value: 'news'
            },
            time: '2018/10/23 10:11'
          },
          {
            img: '/static/images/samples/330x242/image_05.jpg',
            title: '【鮮肉搞稿3】教育體制下被遺忘的LGBT孩子 ◎謝秉霖（國立花蓮高中學生）',
            url: '/news/type/123123',
            cat: {
              name: '最新消息',
              value: 'news'
            },
            time: '2018/10/23 10:11'
          },
          {
            img: '/static/images/samples/330x242/image_06.jpg',
            title: '異男可以扮裝挺同志嗎？—「倫敦講臺」',
            url: '/news/type/123123',
            cat: {
              name: '最新消息',
              value: 'news'
            },
            time: '2018/10/23 10:11'
          },
          {
            img: '/static/images/samples/330x242/image_07.jpg',
            title: '異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思',
            url: '/news/type/123123',
            cat: {
              name: '最新消息',
              value: 'news'
            },
            time: '2018/10/23 10:11'
          },
          {
            img: '/static/images/samples/330x242/image_08.jpg',
            title: '異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思',
            url: '/news/type/123123',
            cat: {
              name: '最新消息',
              value: 'news'
            },
            time: '2018/10/23 10:11'
          },
          {
            img: '/static/images/samples/330x242/image_09.jpg',
            title: '異男可以扮裝挺同志嗎？—「倫敦講臺」走倫敦同志遊行的行動反思',
            url: '/news/type/123123',
            cat: {
              name: '最新消息',
              value: 'news'
            },
            time: '2018/10/23 10:11'
          }
        ],
        slickOptions: {
          autoplay: false,
          infinite: true,
          variableWidth: true,
          slidesToShow: 4,
          adaptiveHeight: true,
          prevArrow: `<button type="button" class="slick-prev"></button>`,
          nextArrow: `<button type="button" class="slick-next"></button>`,
          responsive: [
            {
              breakpoint: 1070,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 479,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
        }
      }
    },
    methods: {
      goto(path) {
        this.$router.push(path)
      },
      mouseOver() {
        $('.slick-prev').removeClass('prev-leave').addClass('prev-enter')
        $('.slick-next').removeClass('next-leave').addClass('next-enter')
      },
      mouseLeave() {
        $('.slick-prev').removeClass('prev-enter').addClass('prev-leave')
        $('.slick-next').removeClass('next-enter').addClass('next-leave')
      },
      limitTitle(txt) {
        if (txt.length > 21) {
          return `${txt.slice(0, 21)}...`
        } else {
          return txt
        }
      }
    }
  }
</script>

