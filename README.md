# Inventory Management REST API
REST API sederhana menggunakan Laravel untuk mengelola data produk beserta transaksi stok masuk dan stok keluar.
## Tech Stack
* Laravel 12 
* PHP 8.3
* MySQL
---
# Cara Install Project
1. Clone repository
```bash
git clone <repository-url>
cd <nama-project>
```

2. Install dependency

```bash
composer install
```

3. Copy file environment

```bash
cp .env.example .env
```

Jika menggunakan Windows:

```bash
copy .env.example .env
```

4. Generate application key

```bash
php artisan key:generate
```

5. Konfigurasi database pada file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory
DB_USERNAME=root
DB_PASSWORD=
```

---

# Cara Menjalankan Project

Jalankan server Laravel:

```bash
php artisan serve
```

API akan berjalan di:

```
http://127.0.0.1:8000
```

---

# Cara Menjalankan Migration dan Seeder
```bash
php artisan migrate:fresh --seed
```

---

# Cara Login

Endpoint

```
POST /api/login
```

Request

```json
{
    "email": "admin@test.com",
    "password": "password"
}
```

Response

```json
{
    "token": "your-access-token"
}
```

Gunakan token tersebut sebagai Bearer Token pada seluruh endpoint yang membutuhkan autentikasi.

Header:

```
Authorization: Bearer your-access-token
Accept: application/json
```

---

# Daftar Endpoint API

## Authentication

| Method | Endpoint   | 
| ------ | ---------- | 
| POST   | /api/login | 
| GET    | /api/products      | 
| GET    | /api/products/{id} | 
| POST   | /api/products      | 
| PUT    | /api/products/{id} | 
| DELETE | /api/products/{id} | 
| POST   | /api/stock-in |
| POST   | /api/stock-out |
| GET    | /api/transactions |
---
