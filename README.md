## 關於 php-mvc

此專案使用 php 搭配 mvc 概念 所打造的，供初學者學習與參考.

## 環境建置

- php: "^7.\*"
- mysql: 5.7

## 功能介紹

- 設置 PDO 與 路由.
- 登入系統.
- Google 登入.
- 依據路徑自動載入對應的 controller-method.

    ```
    # 假如URL為 'users/login'
    1. Core 物件會進行解析 controllers 目錄下是否有 Users 的物件
    2. 該物件是否有 login 方法並進行呼叫

    # 執行 $this->view('users/login', $data)
    3. 解析 views 目錄下是否有 users/login 檔案
    4. 最後進行檔案內容，可將 $data 數值渲染出來
    ```

## 設置

- 到 app/config/config.php 設置環境參數.
- 將 d_php_mvc.sql 匯入 Mysql 中.