<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img
      src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"
      width="400"
      alt="Laravel Logo"
    >
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>

  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>

  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>

  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

---

# 🚀 專案快速啟動指南
## 使用 Laravel Sail + Docker

本專案已封裝：

- PHP 8.4
- PostgreSQL 15
- Laravel Sail
- Docker

本機不需額外安裝：

- PHP
- Composer
- PostgreSQL

只需先安裝並啟動 Docker Desktop 即可。

---

## 1️⃣ 複製環境設定檔

進入專案根目錄後執行：

```bash
cp .env.example .env
```

---

## 2️⃣ 安裝 Composer 相依套件

若本機沒有 PHP 8.4，可直接使用 Docker 臨時容器執行 Composer：

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install
```

執行完成後會自動產生：

```text
vendor/
```

---

## 3️⃣ 啟動 Docker 開發環境

請於 `docker-compose.yml` 所在目錄執行：

```bash
./vendor/bin/sail up -d
```

> 💡 建議優先使用 Sail，而非直接使用 `docker compose up -d`
> 可獲得較完整的 Laravel 整合支援。

---

## 4️⃣ 產生 Laravel APP_KEY

```bash
./vendor/bin/sail artisan key:generate
```

---

## 5️⃣ 建立 PostgreSQL 資料表

首次啟動請執行 Migration：

```bash
./vendor/bin/sail artisan migrate:fresh
```

> ⚠️ 若出現 `messages` 資料表重複建立錯誤：
>
> 請檢查並刪除重複 Migration 檔案，例如：
>
> ```text
> database/migrations/2026_05_11_130121_create_messages_table.php
> ```
>
> 刪除後重新執行：
>
> ```bash
> ./vendor/bin/sail artisan migrate:fresh
> ```

---

## 6️⃣ 開啟專案

啟動完成後，瀏覽器開啟：

```text
http://localhost
```

即可進入專案畫面。

---

# 🛠️ 常用 Sail 指令

建議加入 alias：

```bash
alias sail="sh vendor/bin/sail"
```

可加入：

- `~/.zshrc`
- `~/.bashrc`

---

## 常用指令列表

### 啟動環境

```bash
./vendor/bin/sail up -d
```

### 關閉環境

```bash
./vendor/bin/sail down
```

### 執行 Artisan 指令

```bash
./vendor/bin/sail artisan [command]
```

範例：

```bash
./vendor/bin/sail artisan migrate
```

### 安裝前端套件

```bash
./vendor/bin/sail npm install
```

### 啟動 Vite 熱更新

```bash
./vendor/bin/sail npm run dev
```

### 進入 Container Shell

```bash
./vendor/bin/sail shell
```

---

# 📘 About Laravel

Laravel 是一套具備優雅語法的 Web Application Framework，
目標是讓開發流程更快速、更直觀、更具可維護性。

Laravel 提供：

- 快速且簡潔的 Routing System
- 強大的 Dependency Injection Container
- 多種 Session / Cache Backend
- Eloquent ORM
- Database Migration
- Queue / Job System
- Event Broadcasting
- API 與 Middleware 架構

---

# 📚 Learning Laravel

Laravel 擁有完整且成熟的學習資源：

- 官方文件
- Laracasts 教學影片
- 社群套件
- 開源生態系

官方文件：

https://laravel.com/docs
