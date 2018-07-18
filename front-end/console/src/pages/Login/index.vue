<template>
  <div class="wrapper">
    <div class="content-wrapper">
      <div class="login-box">
        <div class="login-logo"></div>
        <div class="panel panel-default">
          <div class="panel-heading text-center">登入Fagget管理端</div>
          <div class="panel-body">
            <form role="form" class="form-account form-login">
              <div class="form-group">
                <el-input type="mail" v-model="login.account" placeholder="請輸入帳號(E-mail)"></el-input>
              </div>
              <div class="form-group" :class="{'has-error': hasError.value}">
                <el-input type="password" v-model="login.pass" placeholder="密碼"></el-input>
                <small class="help-block" v-if="hasError.value"><i class="fa fa-exclamation-circle"></i> {{hasError.text}}</small>
              </div>
              <div class="form-group switch">
                <input type="checkbox"  class="switch-btn" id="switch-cache" v-model="login.cache"/>
                <label for="switch-cache" data-on-label="YES" data-off-label="No"></label>
                <span>記住我的帳號密碼</span>
              </div><!-- /.form-group -->
              <div class="form-group">
                <a class="btn btn-primary btn-block" type="submit" @click.stop="loginin">登 入</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /end: login-box -->
    </div>
    <main-footer></main-footer>
  </div>
</template>

<script>
  import Footer from 'components/Footer'
  export default {
    components: {
      'main-footer': Footer
    },
    data() {
      return {
        login: {
          account: '',
          pass: '',
          cache: false
        },
        hasError: {
          value: false,
          text: ''
        }
      }
    },
    methods: {
      loginin() {
        this.$router.push('/')
      }
    }
  }
</script>
