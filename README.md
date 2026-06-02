# 🛒 E-Commerce RESTful API

A robust, secure, and scalable RESTful API backend for an e-commerce platform built with Laravel. This API handles user authentication, product catalog management, order processing, and payment records with absolute database integrity.

---

## 🛠️ Technologies & Core Stack

* **Core Framework:** Laravel 11.x (PHP)
* **Database Engine:** MySQL 8.x / MariaDB
* **API Authentication:** Laravel Sanctum (Stateless Token Management)
* **Dependency & Package Manager:** Composer
* **API Validation & Testing Standards:** Postman / Insomnia

---

## 🚀 Architectural Best Practices

### 1. Database & Precision Mechanics
* **Strict Monetary Precision:** All monetary columns (`price`, `total_price`, `amount`) utilize `DECIMAL(10,2)` instead of `FLOAT` or `DOUBLE`. This completely eliminates floating-point rounding errors during financial calculations.
* **Point-in-Time Price Auditing:** The `order_items` table features a dedicated `price` column to capture a critical historic snapshot. If a merchant updates a product's price in the master catalog later, historical financial records, past invoices, and gross sales calculations remain entirely uncorrupted.
* **Referential Integrity Constraints:** * Uses `onDelete('cascade')` for standard child dependencies (e.g., if a user deletes their account, their pending orders cascade safely).
  * Enforces `onDelete('restrict')` on `order_items.product_id`. This hard-blocks the accidental deletion of a core product from the master catalog if it is tied to active, historic transaction data.

### 2. Performance & Query Optimization
* **Index Strategy:** Targeted database indexes are applied to heavily filtered columns and lookups. Foreign keys like `user_id`, `category_id`, and `order_id` are indexed implicitly by Laravel's `foreignId` blueprint method, alongside columns frequently targeted in search scopes (such as `users.email`).
* **Framework Convention Alignment:** Table names are pluralized snake_case (`users`, `order_items`) to mesh flawlessly with Laravel's Eloquent Object-Relational Mapping (ORM), eliminating the need to declare explicit overrides in model setups.

### 3. API Security & Integrity
* **Cryptographic Hashing:** Passwords are never stored as plaintext. All credentials are pass-through hashed via standard hashing algorithms (`Bcrypt` or `Argon2ID`) leveraging Laravel's native `Hash::make()` abstraction.
* **Database-Level Data Scoping:** Fields like `orders.status` and `payments.status` utilize restricted `ENUM` pools instead of free-form string entries. This stops unvalidated or corrupted payload data from compromising the order lifecycle pipeline.
* **Unified State Tracking:** Standard Laravel timestamp rows (`created_at` and `updated_at`) are appended to all tables to provide instantaneous auditing, row tracing, and simple delta tracking for API syncing.

---

## 🗄️ Database Schema Design

The relational database structure is highly optimized for transaction consistency, precise historical tracking, and speed.

### 📋 Tables Overview

#### 1. users
| Field | Type | Constraint |
| :--- | :--- | :--- |
| id | BIGINT | Primary Key (Unsigned, Auto Increment) |
| email | VARCHAR(255) | Unique, Not Null |
| password | VARCHAR(255) | Not Null (Hashed) |
| address | VARCHAR(255) | Nullable |
| phone | VARCHAR(255) | Nullable |
| is_active | BOOLEAN | Default TRUE |
| profile_image | VARCHAR(255) | Nullable |
| created_at | TIMESTAMP | Nullable |
| updated_at | TIMESTAMP | Nullable |

#### 2. categories
| Field | Type | Constraint |
| :--- | :--- | :--- |
| id | BIGINT | Primary Key (Unsigned, Auto Increment) |
| name | VARCHAR(255) | Not Null |
| description | TEXT | Nullable |
| created_at | TIMESTAMP | Nullable |
| updated_at | TIMESTAMP | Nullable |

#### 3. products
| Field | Type | Constraint |
| :--- | :--- | :--- |
| id | BIGINT | Primary Key (Unsigned, Auto Increment) |
| category_id | BIGINT | Foreign Key → `categories(id)` (On Delete Cascade) |
| name | VARCHAR(255) | Not Null |
| price | DECIMAL(10,2) | Not Null |
| description | TEXT | Nullable |
| image_url | VARCHAR(255) | Nullable |
| stock_quantity | INT | Default 0 |
| created_at | TIMESTAMP | Nullable |
| updated_at | TIMESTAMP | Nullable |

#### 4. orders
| Field | Type | Constraint |
| :--- | :--- | :--- |
| id | BIGINT | Primary Key (Unsigned, Auto Increment) |
| user_id | BIGINT | Foreign Key → `users(id)` (On Delete Cascade) |
| total_price | DECIMAL(10,2) | Not Null |
| status | ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled') | Default 'pending' |
| payment_method | VARCHAR(100) | Not Null |
| created_at | TIMESTAMP | Nullable |
| updated_at | TIMESTAMP | Nullable |

#### 5. order_items
| Field | Type | Constraint |
| :--- | :--- | :--- |
| id | BIGINT | Primary Key (Unsigned, Auto Increment) |
| order_id | BIGINT | Foreign Key → `orders(id)` (On Delete Cascade) |
| product_id | BIGINT | Foreign Key → `products(id)` (On Delete Restrict) |
| quantity | INT | Not Null |
| price | DECIMAL(10,2) | Not Null (Snapshot of price at purchase time) |
| created_at | TIMESTAMP | Nullable |
| updated_at | TIMESTAMP | Nullable |

#### 6. payments
| Field | Type | Constraint |
| :--- | :--- | :--- |
| id | BIGINT | Primary Key (Unsigned, Auto Increment) |
| order_id | BIGINT | Foreign Key → `orders(id)` (On Delete Cascade) |
| amount | DECIMAL(10,2) | Not Null |
| payment_method | VARCHAR(255) | Not Null |
| status | ENUM('pending', 'completed', 'failed', 'refunded') | Default 'pending' |
| created_at | TIMESTAMP | Nullable |
| updated_at | TIMESTAMP | Nullable |

---

### 🔗 Entity Relationships

text
users (1) ----------- (N) orders

categories (1) ------- (N) products

orders (1) ---------- (N) order_items

products (1) -------- (N) order_items

orders (1) ---------- (1) payments
