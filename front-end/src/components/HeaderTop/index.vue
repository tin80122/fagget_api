<template>
  <div class="header_top_bar_container clearfix">
    <div class="header_top_bar">
      <div class="search">
        <input type="text" name="s" placeholder="Search..." value="Search..." class="search_input hint">
        <button type="submit" class="search_submit" @click="search"/>
      </div>
      <a href="javascript:;" id="menu-icon" @click.stop="menuTrigger"><span :class="{'cross': getMobileMenuTrigger}"></span></a>
      <ul class="social_icons clearfix">
        <li>
          <a target="_blank" href="http://facebook.com/QuanticaLabs" class="social_icon facebook" title="facebook">
            &nbsp;
          </a>
        </li>
        <li>
          <a href="mailto:contact@pressroom.com" class="social_icon mail" title="mail">
            &nbsp;
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
  import {mapMutations, mapGetters} from 'vuex'
  export default {
    data() {
      return {
      }
    },
    methods: {
      menuTrigger() {
        this.setMenuActive(!this.getMobileMenuTrigger)
      },
      search() {
        this.$router.push('/search')
      },
      ...mapMutations({
        setMenuActive: 'TRIGGER_MOBILE_MENU'
      })
    },
    computed: {
      ...mapGetters([
        'getMobileMenuTrigger'
      ])
    },
  }
</script>

