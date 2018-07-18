# fagget-backend

> Fagget 後台前端頁面

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
> Fagget 後台 現階段規劃將具備六種版型，分別放置於`src/pages`中。目前頁面排版已完成：基本架構、`Article-List`、`Article`、`Error`

> 表單元件採用第三方 [element-ui](http://element.eleme.io/#/zh-CN/component/installation) 。版本：2.3.9

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
        3. js
            * vendor
                > 第三方資源

## 待辦事項
- [ ] API串接
- [ ] Category
- [ ] MemberInfo
- [ ] 根據API獲取的資訊動態產生Router
  - [ ] menu
  - [ ] breadcrumb
