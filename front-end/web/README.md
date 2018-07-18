# fagget

> Fagget 前台前端頁面

## Build Setup

``` bash
# 安裝環境依賴
npm install 或 yarn

# 依賴安裝完畢後，建立development serve。支援 hot reload，可以在 http://localhost:8080上即時查看修改
npm run dev 或 yarn run dev

# 建立production檔案，檔案已壓縮
npm run build 或 yarn run build

# build for production and view the bundle analyzer report
npm run build --report
```

## 架構說明
> Fagget 前台基本上只有六種版型，分別放置於`src/pages`裡頭

1. javascript 位置
    * src
        * api
          > 各頁面API function
        * components
          > 共用組件
        * pages
          > 各頁面
          * subpage
            > 僅針對該頁面才有的子元件
        * router
          > 路由設定
        * store
          > 狀態管理
2. style 位置
    * src
        * assets
            * sass
                > style編輯
    * static
      > 靜態資源
        1. css
        2. images

## 待辦事項
- [ ] API串接
- [ ] 根據API獲取的資訊動態產生Router
  - [ ] menu
  - [ ] breadcrumb
- [ ] google analytics
    * [Vue-analytics](https://github.com/MatteoGabriele/vue-analytics)
    * [vue-ua](https://github.com/ScreamZ/vue-analytics)
- [ ] SEO
    * [vue-prerender-snipcart](https://github.com/snipcart/vue-prerender-snipcart)
        * 範例文章：https://jeneser.github.io/blog/2017/08/07/vue-seo-demo/
    * [vue-head](https://github.com/ktquez/vue-head)
    * [vue-meta](https://github.com/declandewet/vue-meta)
