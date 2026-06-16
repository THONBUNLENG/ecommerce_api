# E-Commerce Laravel Application

A Laravel e-commerce application with a Blade storefront, Jetstream authentication, Filament admin resources, product variations, cart, wishlist, checkout, and order management.

The project is primarily a server-rendered Laravel application. `routes/api.php` currently only registers the Sanctum authenticated user endpoint.

---

## Tech Stack

- **Framework:** Laravel 10.x
- **PHP:** 8.1+
- **Database:** MySQL
- **Admin Panel:** Filament 3.x
- **Authentication/UI:** Laravel Jetstream, Fortify, Livewire 3.x
- **API Tokens:** Laravel Sanctum
- **Frontend Build:** Vite 5, Tailwind CSS 3, PostCSS, Autoprefixer
- **Image Handling:** Intervention Image
- **Testing:** PHPUnit

---

## Installation

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm run dev
php artisan serve
```

Run the app at:

```text
http://localhost:8000
```

---

## Development Commands

```bash
npm run dev
npm run build
php artisan test
./vendor/bin/pint
```

---

## Main Features

### Storefront

- Home page with slides, promotions, popular products, latest drops, trusted images, and customer images.
- Featured collection page.
- Category pages with layout variants:
  - left sidebar
  - right sidebar
  - three columns
  - four columns
  - no sidebar
- Product listing page.
- Product detail page with related products, images, sizes, colors, and variations.
- Cart add, update, remove, and checkout flow.
- Wishlist add and remove.
- Static pages: about, FAQ, contact, terms, and policy.

### Authentication

- Login and registration through Laravel Jetstream/Fortify.
- New users are created with `role = user`.
- Admin users are detected by `role = admin`.
- Admin login/register redirects to the admin panel dashboard.
- User login/register redirects to `/dashboard`.

### Admin

The application has two admin areas:

1. **Filament admin panel**
   - Path: `/admin`
   - Uses `AdminMiddleware`, which requires `auth()->user()->role === 'admin'`.
   - Resources include categories, colors, orders, order details, payments, products, promotions, sizes, slides, and users.

2. **Custom admin routes**
   - Prefix: `/panel`
   - Requires web authentication and admin role.
   - Includes dashboard, products, orders, customers, and settings pages.

---

## Public Routes

| Route | Description |
| :--- | :--- |
| `GET /` | Home page |
| `GET /featured-collection` | Featured collection page |
| `GET /category-pages-with-left-sidebar/{category?}` | Category page with left sidebar |
| `GET /category-pages-with-right-sidebar/{category?}` | Category page with right sidebar |
| `GET /category-pages-three-column/{category?}` | Category page with three columns |
| `GET /category-pages-four-column/{category?}` | Category page with four columns |
| `GET /category-pages-without-sidebar/{category?}` | Category page without sidebar |
| `GET /view-products` | Product listing page |
| `GET /product/{id}` | Product detail page |
| `GET /filter-products/{cateId}` | JSON product filter by category |
| `GET /wishlist` | Wishlist page |
| `DELETE /wishlist/remove/{productId}` | Remove item from wishlist |
| `GET /cart` | Cart page |
| `POST /cart/add/{productId}` | Add item to cart |
| `PUT /cart/update/{itemId}` | Update cart item quantity |
| `DELETE /cart/remove/{itemId}` | Remove cart item |
| `GET /checkout` | Checkout page |
| `POST /checkout/process` | Create order from cart |
| `GET /about` | About page |
| `GET /faq` | FAQ page |
| `GET /contact` | Contact page |

---

## Admin Routes

| Route | Description |
| :--- | :--- |
| `GET /panel/dashboard` | Admin dashboard |
| `GET /panel/products` | Product list |
| `GET /panel/products/create` | Product create form |
| `POST /panel/products` | Store product |
| `POST /panel/products/bulk-deactivate` | Bulk deactivate products |
| `POST /panel/products/bulk-delete` | Bulk delete products |
| `POST /panel/products/bulk-restore` | Bulk restore products |
| `DELETE /panel/products/bulk-force-delete` | Bulk force delete products |
| `GET /panel/products/{id}/edit` | Product edit form |
| `PUT /panel/products/{id}` | Update product |
| `DELETE /panel/products/{id}` | Soft delete product |
| `DELETE /panel/products/{id}/force` | Force delete product |
| `POST /panel/products/{id}/restore` | Restore product |
| `POST /panel/products/{id}/toggle-active` | Toggle product active status |
| `GET /panel/orders` | Order list |
| `GET /panel/orders/{id}` | Order detail |
| `DELETE /panel/orders/{id}` | Delete order |
| `GET /panel/customers` | Customer list |
| `GET /panel/customers/{id}` | Customer detail |
| `GET /panel/settings` | Settings page |
| `POST /panel/settings` | Update settings |

---

## API Routes

| Route | Method | Auth | Description |
| :--- | :--- | :--- | :--- |
| `/api/user` | `GET` | Sanctum | Return authenticated user |

---

## Database Tables

### Core E-Commerce Tables

| Table | Description |
| :--- | :--- |
| `users` | Jetstream users with `role` column for admin/user access |
| `categories` | Product categories |
| `products` | Products with pricing, stock, SEO, popularity, latest-drop, soft-delete, JSON sizes/colors, SKU, slug, and image fields |
| `product_images` | Multiple images per product with primary image and sort order |
| `sizes` | Size options |
| `colors` | Color options |
| `product_variations` | Product size/color combinations with stock and price adjustment |
| `carts` | User cart items with unique `user_id + product_id` |
| `wishlists` | User wishlist items with unique `user_id + product_id` |
| `orders` | Customer orders with status, total, and payment method |
| `order_details` | Order line items with product snapshot price |
| `payments` | Payment records linked to orders |
| `promotions` | Homepage promotion records |
| `slides` | Homepage slider records |

### Laravel/Auth Tables

| Table | Description |
| :--- | :--- |
| `password_reset_tokens` | Password reset tokens |
| `personal_access_tokens` | Sanctum API tokens |
| `sessions` | Database sessions |
| `failed_jobs` | Failed queued jobs |

---

## Key Model Relationships

| Model | Relationships |
| :--- | :--- |
| `User` | Has many products, carts, wishlists, and orders |
| `Category` | Has many products |
| `Product` | Belongs to category and user; has many order details, variations, and images |
| `ProductVariation` | Belongs to product, color, and size |
| `ProductImage` | Belongs to product |
| `Cart` | Belongs to user and product |
| `Wishlist` | Belongs to user and product |
| `Order` | Belongs to user; has one payment; has many order details |
| `OrderDetail` | Belongs to order and product |
| `Payment` | Belongs to order |

---

## Product Fields

The `products` table includes:

- `id`
- `name`
- `slug`
- `sku`
- `description`
- `long_description`
- `price`
- `original_price`
- `discount_price`
- `category_id`
- `stock_quantity`
- `stock_status`
- `image_url`
- `user_id`
- `is_popular`
- `is_latest_drop`
- `is_active`
- `meta_title`
- `meta_description`
- `sizes` as JSON
- `colors` as JSON
- `deleted_at`
- `created_at`
- `updated_at`

---

## Checkout Flow

`POST /checkout/process` validates customer and payment details, calculates subtotal, tax, and total, then creates:

1. One `orders` row.
2. One `order_details` row for each cart item.
3. Deletes the authenticated user's cart rows.

The checkout flow does not create rows in the `payments` table.

---

## Seeding

Available seeders include:

- `UserSeeder`
- `CategorySeeder`
- `ColorSeeder`
- `SizeSeeder`
- `SlideSeeder`
- `PromotionSeeder`
- `ProductSeeder`
- `ProductVariationSeeder`
- `PaymentSeeder`
- `OrderDetailSeeder`
- `OrderSeeder`
- `DatabaseSeeder`

Run seeds with:

```bash
php artisan db:seed
```

---

## Notes

- Product soft deletes are enabled through the `deleted_at` column.
- Product images are served through the storage URL accessor.
- Cart and wishlist uniqueness is enforced by `user_id` and `product_id`.
- Admin access is controlled by the `role` column on `users`.
