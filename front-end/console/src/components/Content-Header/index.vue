<template>
  <div class="content-header clearfix">
    <div class="pull-left">
      <h1>{{title}}</h1>
      <ol class="breadcrumb">
        <li class="active">DashBoard</li>
        <li></li>
      </ol>
    </div>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        title: '歡迎',
        breadcrumb: []
      }
    }
  }
</script>
