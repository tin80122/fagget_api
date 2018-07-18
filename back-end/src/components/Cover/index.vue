<template>
  <transition name="cover">
    <div class="cover" @click.stop="coverTrigger"></div>
  </transition>
</template>

<script>
  import {mapMutations} from 'vuex'
  export default {
    data () {
      return {

      }
    },
    methods: {
      coverTrigger() {
        this.setMenuActive(false)
      },
      ...mapMutations({
        setMenuActive: 'TRIGGER_MENU'
      })
    }
  }
</script>
