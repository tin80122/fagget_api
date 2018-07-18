<template>
  <div>
    <search-area>
      <div class="panel-body filter-wrap">
        <form class="form-inline pull-left fagget-from-inline">
          <div class="form-group">
            <div class="input-group">
              <el-input type="text" placeholder="搜尋" v-model="search.searchInput">
                <el-button slot="append" icon="el-icon-search"></el-button>
              </el-input>
            </div>
          </div>
          <div class="form-group">
            <div class="datetime-range-picker">
              <el-date-picker
                v-model="search.startTime"
                type="date"
                placeholder="開始日期">
              </el-date-picker>
              <span>~</span>
              <el-date-picker
                v-model="search.endTime"
                type="date"
                placeholder="結束日期">
              </el-date-picker>
            </div>
          </div>
          <div class="form-group">
            <el-select v-model="search.status" filterable placeholder="選擇狀態">
              <el-option
                v-for="item in search.statusOptions"
                :key="item.value"
                :label="item.label"
                :value="item.value">
              </el-option>
            </el-select>
          </div>
          <div class="form-group">
            <el-select v-model="search.cat" filterable placeholder="選擇文章分類">
              <el-option
                v-for="item in search.catOptions"
                :key="item.value"
                :label="item.label"
                :value="item.value">
              </el-option>
            </el-select>
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-submit btn-primary">查詢</button>
          </div>
        </form>
        <button type="button" class="btn btn-default pull-right">重置查詢設定</button>
      </div>
    </search-area>
    <div class="panel panel-base">
      <div class="panel-body">
        <router-link to="/article/category/12312" class="btn btn-primary" style="margin-bottom: 20px;">新增</router-link>
        <el-table
          :data="tableData"
          border>
          <el-table-column
            prop="date"
            label="日期"
            width="120">
          </el-table-column>
          <el-table-column
            prop="title"
            label="文章標題"
            width="900">
          </el-table-column>
          <el-table-column
            prop="cat"
            label="類別"
            width="90"
          >
          </el-table-column>
          <el-table-column
            fixed="right"
            label="操作"
            width="150">
            <template slot-scope="scope">
              <el-button
                @click.native.prevent="deleteRow(scope.$index, tableData)"
                type="primary"
                size="small">
                編輯
              </el-button>
              <el-button
                @click.native.prevent="deleteRow(scope.$index, tableData)"
                size="small">
                移除
              </el-button>
            </template>
          </el-table-column>
        </el-table>
      </div>
    </div>
  </div>
</template>

<script>
  import SearchArea from 'components/Search-Area'
  export default {
    components: {
      SearchArea
    },
    methods: {
      deleteRow(index, rows) {
        rows.splice(index, 1);
      }
    },
    data () {
      return {
        search: {
          startTime: '',
          endTime: '',
          searchInput: '',
          status: '',
          statusOptions: [
            {
              value: true,
              label: '啟用'
            },
            {
              value: false,
              label: '關閉'
            }
          ],
          cat: '',
          catOptions: [
            {
              value: '1',
              label: '分類一'
            },
            {
              value: '2',
              label: '分類二'
            }
          ]
        },
        tableData: [
          {
            date: '2018-03-12',
            title: '文章標題',
            cat: '分類一'
          }
        ]
      }
    }
  }
</script>
