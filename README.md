# 🌸 Noiré — Perfume E-Commerce Website
Noiré is a modern perfume e-commerce website built with **Laravel**, designed to deliver a luxurious shopping experience.
This project features product management, coupon system, checkout flow, and **Midtrans payment gateway (Sandbox)** integration.

---
## ✨ Features

### 🛍 Customer Side

* Browse perfume products
* Add products to cart
* Apply discount coupons
* Secure checkout with **Midtrans Snap**
* Payment methods:
  * QRIS
  * E-Wallet
  * Bank Transfer (Sandbox)
* Clean & responsive UI

### 🧑‍💼 Admin Panel

* Product CRUD (Create, Read, Update, Delete)
* Coupon management
* Blog management
* Testimonials management
* Soft delete products
* Dashboard overview

---
## 🧰 Tech Stack

* **Backend**: Laravel
* **Frontend**: Blade + Bootstrap 5
* **Database**: MySQL
* **Payment Gateway**: Midtrans Snap (Sandbox)
* **Authentication**: Laravel Auth
* **Storage**: Local / Public Storage

---
## 📸 Screenshots
<img width="2880" height="9710" alt="image" src="https://github.com/user-attachments/assets/2b4afa72-4a3b-4a1d-8e6d-dc6d9d3317e1" />


---
## ⚙️ Installation Guide

### 1️⃣ Clone Repository

```bash
git clone https://github.com/yourusername/noire-ecommerce.git
cd noire-ecommerce
```

### 2️⃣ Install Dependencies

```bash
composer install
npm install && npm run build
```

### 3️⃣ Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Set your database in `.env`:

```env
DB_DATABASE=noire_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Migrate Database

```bash
php artisan migrate
```

### 5️⃣ Storage Link

```bash
php artisan storage:link
```

---
## 💳 Midtrans Configuration (Sandbox)

Add this to your `.env`:

```env
MIDTRANS_SERVER_KEY=SB-Mid-server-xxxxxxxx
MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxxxxxx
MIDTRANS_IS_PRODUCTION=false
MIDTRANS_IS_SANITIZED=true
MIDTRANS_IS_3DS=true
```

Midtrans config file:

```php
// config/midtrans.php
return [
    'serverKey' => env('MIDTRANS_SERVER_KEY'),
    'clientKey' => env('MIDTRANS_CLIENT_KEY'),
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    'isSanitized' => true,
    'is3ds' => true,
];
```

✅ **Sandbox payments will NOT deduct real balance**, but some methods still require sufficient fake balance.

---
## 🧪 Testing Payments (Sandbox)

**QRIS**

* Scan QR via Midtrans Simulator
* If using e-wallet app, insufficient balance may block payment

**E-Wallet**

* Works in Sandbox simulation
* No real money deducted

---
## 🗂 Project Structure Highlights

```
app/
 ├── Http/
 │   ├── Controllers/
 │   │   ├── Admin/
 │   │   ├── AboutController.php
 │   │   ├── AdminController.php
 │   │   ├── AuthController.php
 │   │   ├── BlogController.php
 │   │   ├── CartController.php
 │   │   ├── CheckoutController.php
 │   │   ├── Controller.php
 │   │   ├── HomeController.php
 │   │   ├── MidtransCallbackController.php
 │   │   ├── ServicesController.php
 │   │   └── ShopController.php
 ├── Models/
resources/
 ├── views/
 │   ├── admin/
 │   ├── auth/
 │   ├── layouts/
 │   ├── pages/
 │   └── partials/
```

---
## 👩‍💻 Founder

**Shendy Tria Amelyana**
Founder & Developer of **Noiré**

*Noire was created as a blend of technology and elegance, inspired by the timeless beauty of fragrance.*

---
## 📌 Notes

* This project uses **Midtrans Sandbox** only
* Not recommended for production use without additional security & validation
* Perfect for **portfolio**, **final project**, or **learning reference**

---
## 📄 License

This project is licensed under the **MIT License**.
You are free to use and modify it for personal or educational purposes.
