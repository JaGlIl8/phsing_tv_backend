<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## 🚀 專案快速啟動指南 (使用 Laravel Sail & Docker)

本專案已封裝好 **PHP 8.4** 與 **PostgreSQL 15** 開發環境，本機無需安裝 PHP、Composer 或資料庫，只需確保電腦已啟動 **Docker Desktop** 即可。

### 1. 複製環境設定檔
進入專案根目錄，複製環境範本並建立 `.env`：
```bash
cp .env.example .env

2. 初始化並安裝 Composer 套件

若本機沒有 PHP 8.4，請直接執行以下 Docker 臨時指令來下載並安裝專案相依套件（會自動產生 vendor 資料夾）：
Bash

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install

3. 啟動 Docker 虛擬環境

在 docker-compose.yml 所在的專案根目錄，執行以下指令啟動（背景執行）：
Bash

./vendor/bin/sail up -d

    💡 註：你也可以使用傳統的 docker compose up -d，但建議使用 ./vendor/bin/sail 能獲得更完整的 Laravel 整合支援。

4. 產生應用程式密鑰 (APP_KEY)
Bash

./vendor/bin/sail artisan key:generate

5. 建立 PostgreSQL 資料庫結構 (Migration)

本專案使用 PostgreSQL，初次啟動需要讓系統自動建立資料表：
Bash

./vendor/bin/sail artisan migrate:fresh

    ⚠️ 注意：若過程中提示 messages 資料表重複建立的錯誤，請先手動檢查並刪除重複的 Migration 檔案（例如：database/migrations/2026_05_11_130121_create_messages_table.php），接著再次執行一次 migrate:fresh 即可。

6. 開啟網頁

一切就緒後，打開瀏覽器輸入：
👉 http://localhost 即可看見專案畫面！
🛠️ 常用 Sail 指令速查

為了方便開發，建議在你的 Zsh 或 Bash 設定檔（如 ~/.zshrc）加入別名：alias sail="sh vendor/bin/sail"。

    關閉環境：./vendor/bin/sail down

    執行 Artisan 指令：./vendor/bin/sail artisan [指令]

    安裝前端套件：./vendor/bin/sail npm install

    啟動前端熱重載：./vendor/bin/sail npm run dev

    進入容器 CLI 終端機：./vendor/bin/sail shell

About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

    Simple, fast routing engine.

    Powerful dependency injection container.

    Multiple back-ends for session and cache storage.

    Expressive, intuitive database ORM.

    Database agnostic schema migrations.

    Robust background job processing.

    Real-time event broadcasting.

Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of all modern web application frameworks.