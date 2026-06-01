# 🗄️ Database Schema Design

This project uses a relational database structure for managing users, products, categories, orders, and payments in an e-commerce system.

---

## 📋 Tables Overview

### 1. User

| Field | Type | Constraint |
|---------|---------|---------|
| id | INT | Primary Key |
| email | VARCHAR(255) | Unique |
| password | VARCHAR(255) | Not Null |
| address | VARCHAR(255) | |
| phone | VARCHAR(255) | |
| is_active | BOOLEAN | Default TRUE |
| profile_image | VARCHAR(255) | |

---

### 2. Category

| Field | Type | Constraint |
|---------|---------|---------|
| id | INT | Primary Key |
| name | VARCHAR(255) | Not Null |
| description | TEXT | |

---

### 3. Product

| Field | Type | Constraint |
|---------|---------|---------|
| id | INT | Primary Key |
| category_id | INT | Foreign Key → Category(id) |
| name | VARCHAR(255) | Not Null |
| price | DECIMAL(10,2) | Not Null |
| description | TEXT | |
| image_url | VARCHAR(255) | |
| stock_quantity | INT | Default 0 |

---

### 4. Order

| Field | Type | Constraint |
|---------|---------|---------|
| id | INT | Primary Key |
| user_id | INT | Foreign Key → User(id) |
| total_price | DECIMAL(10,2) | Not Null |
| order_date | DATETIME | |
| status | VARCHAR(50) | |
| payment_method | VARCHAR(100) | |

---

### 5. OrderDetail

| Field | Type | Constraint |
|---------|---------|---------|
| id | INT | Primary Key |
| order_id | INT | Foreign Key → Order(id) |
| product_id | INT | Foreign Key → Product(id) |
| quantity | INT | Not Null |
| price | DECIMAL(10,2) | Not Null |

---

### 6. Payment

| Field | Type | Constraint |
|---------|---------|---------|
| id | INT | Primary Key |
| order_id | INT | Foreign Key → Order(id) |
| payment_date | DATETIME | |
| amount | DECIMAL(10,2) | Not Null |
| payment_method | VARCHAR(255) | |
| status | BOOLEAN | |

---

## 🔗 Entity Relationships

```text
User (1) ----------- (N) Order

Category (1) ------- (N) Product

Order (1) ---------- (N) OrderDetail

Product (1) -------- (N) OrderDetail

Order (1) ---------- (1) Payment
```

---

## 📊 ERD Structure

```text
User
 └── Order
      ├── OrderDetail
      │      └── Product
      │             └── Category
      └── Payment
```

---

## 🚀 Best Practices

- Use `DECIMAL(10,2)` for monetary values.
- Hash passwords before storing them.
- Add `created_at` and `updated_at` timestamps to all tables.
- Use ENUM values for order and payment statuses.
- Create indexes on frequently queried fields.

---

## 🛠️ Technologies

- MySQL
- Spring Boot
- JPA / Hibernate
- Maven

---

## 📌 Future Enhancements

- Shopping Cart
- Wishlist
- Product Reviews
- Coupons & Discounts
- Shipping Management
- Admin Dashboard
- Role-Based Authentication
