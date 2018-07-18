<template>
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="form-manage-wrap">
        <el-form class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 control-label"><i class="ico-rad">*</i>文章標題：</label>
            <div class="col-sm-9">
              <el-input type="text" placeholder="" v-model="article.title"/>
            </div><!-- /.col-sm... -->
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><i class="ico-rad">*</i>內文</label>
            <div class="col-sm-9">
              <!-- <el-input type="textarea" placeholder="" v-model="article.content"/> -->
              <vue-html5-editors :content="article.content" :height="500" @change="updateData"></vue-html5-editors>
            </div><!-- /.col-sm... -->
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><i class="ico-rad">*</i>上下架時間：</label>
            <div class="col-sm-5">
              <div class="datetime-range-picker">
                <el-date-picker
                  v-model="article.startTime"
                  type="date"
                  placeholder="開始日期">
                </el-date-picker>
                <span>~</span>
                <el-date-picker
                  v-model="article.endTime"
                  type="date"
                  placeholder="結束日期">
                </el-date-picker>
              </div>
            </div><!-- /.col-sm... -->
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><i class="ico-rad">*</i>狀態：</label>
            <div class="col-sm-4">
              <input type="checkbox"  class="switch-btn" id="switch" checked v-model="article.status"/>
              <label for="switch" data-on-label="啟用" data-off-label="關閉"></label>
            </div><!-- /.col-sm... -->
          </div><!-- /.form-group -->
          <div class="form-group">
            <label class="col-sm-3 control-label">建立人員：</label>
            <div class="col-sm-9">
              <p class="form-control-static">stanley823@gmail.com</p>
            </div><!-- /.col-sm... -->
          </div><!-- /.form-group -->
          <div class="form-group">
            <label class="col-sm-3 control-label">建立時間：</label>
            <div class="col-sm-9">
              <p class="form-control-static">2016/02/05 12:56:00</p>
            </div><!-- /.col-sm... -->
          </div><!-- /.form-group -->
          <div class="form-group">
            <label class="col-sm-3 control-label">修改人員：</label>
            <div class="col-sm-9">
              <p class="form-control-static">stanley823@gmail.com</p>
            </div><!-- /.col-sm... -->
          </div><!-- /.form-group -->
          <div class="form-group">
            <label class="col-sm-3 control-label">修改時間：</label>
            <div class="col-sm-9">
              <p class="form-control-static">2016/02/05 18:56:00</p>
            </div><!-- /.col-sm... -->
          </div><!-- /.form-group -->
          <div class="form-group btns-footer">
            <button type="button" class="btn btn-w-lg btn-primary">儲存</button>
            <button type="button" class="btn btn-muted">取消</button>
          </div>
        </el-form><!-- / form -->
      </div><!-- /.form-wrap -->
    </div><!-- /.panel-body -->
</div>
</template>

<script>
  import Vue from 'vue'
  import VueHtml5Editor from 'vue-html5-editor'
  const options = {
    name: 'vue-html5-editor',
    showModuleName: false,
    icons: {
      text: 'fa fa-pencil',
      color: 'fa fa-paint-brush',
      font: 'fa fa-font',
      align: 'fa fa-align-justify',
      list: 'fa fa-list',
      link: 'fa fa-chain',
      unlink: 'fa fa-chain-broken',
      tabulation: 'fa fa-table',
      image: 'fa fa-file-image-o',
      hr: 'fa fa-minus',
      eraser: 'fa fa-eraser',
      undo: 'fa-undo fa',
      'full-screen': 'fa fa-arrows-alt',
      info: 'fa fa-info',
    },
    image: {
      sizeLimit: 512 * 1024,
      upload: {
        url: null,
        headers: {},
        params: {},
        fieldName: {}
      },
      compress: {
        width: 1600,
        height: 1600,
        quality: 80
      },
      uploadHandler(responseText){
        var json = JSON.parse(responseText)
        if (!json.ok) {
          alert(json.msg)
        } else {
          return json.data
        }
      }
    },
    language: 'zh-tw',
    i18n: {
      'zh-tw': {
        'align': '對齊方式',
        'image': '圖片',
        'list': '練表',
        'link': '超連結',
        'unlink': '去除超連結',
        'table': '表格',
        'font': '文字',
        'full screen': '全螢幕',
        'text': '排版',
        'eraser': '格式清除',
        'info': '關於',
        'color': '顏色',
        'please enter a url': '請輸入網址',
        'create link': '建立超連結',
        'bold': '粗體',
        'italic': '斜體',
        'underline': '下划線',
        'strike through': '刪除線',
        'subscript': '上標',
        'superscript': '下標',
        'heading': '標題',
        'font name': '字體',
        'font size': '文字大小',
        'left justify': '向左對齊',
        'center justify': '置中對齊',
        'right justify': '向右對齊',
        'ordered list': '有序列表',
        'unordered list': '無序列表',
        'fore color': '前景色',
        'background color': '背景色',
        'row count': '行數',
        'column count': '列數',
        'save': '確定',
        'upload': '上傳',
        'progress': '進度',
        'unknown': '未知',
        'please wait': '請稍等',
        'error': '錯誤',
        'abort': '中斷',
        'reset': '重置'
      }
    },
    hiddenModules: [
      'font',
      'full-screen',
      'info',
      'color'
    ],
    visibleModules: [
      'text',
      'align',
      'list',
      'link',
      'unlink',
      'tabulation',
      'image',
      'hr',
      'eraser',
      'undo',
    ],
    modules: {
    }
  }
  const VueHtml5Editors = new VueHtml5Editor(options)
  export default {
    components: {
      VueHtml5Editors
    },
    data () {
      return {
        article: {
          title: '',
          content: '',
          status: true,
          startTime: '',
          endTime: ''
        }
      }
    },
    methods: {
      updateData(val) {
        this.article.content = val
      }
    }
  }
</script>
