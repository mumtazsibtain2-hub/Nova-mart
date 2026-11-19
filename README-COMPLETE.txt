LUMÉA BEAUTY — COMPLETE LOCAL E-COMMERCE BUILD (V5)
======================================================
Brand: Luméa Beauty
Tagline: Beauty Made Effortless
Stack: PHP 8+, MySQL, PDO, Bootstrap 5, JavaScript/AJAX
Target: XAMPP / Apache / MySQL / phpMyAdmin / localhost

INSTALL / REPLACE
-----------------
1. Extract the folder as:
      C:\xampp\htdocs\lumea-beauty\
2. Start Apache and MySQL in XAMPP.
3. In phpMyAdmin, import:
      database/lumea_beauty.sql
   The SQL creates the `lumea_beauty` database and sample data.
4. Open:
      http://localhost/lumea-beauty/setup-check.php
5. Then open:
      http://localhost/lumea-beauty/

ADMIN LOGIN
-----------
URL:      http://localhost/lumea-beauty/admin/login.php
Email:    admin@lumeabeauty.local
Password: Admin@12345

Change the default admin password/hash before a public deployment.

CORE STOREFRONT INCLUDED
------------------------
- Premium responsive Luméa theme and sticky responsive header
- Homepage with hero, 10 categories, featured/new/bestseller/trending products,
  concerns, makeup/skincare edits, sale banner, brands, trust cards, reviews,
  beauty blog, social gallery, newsletter and recently viewed products
- Shop with combined filters, sorting, pagination, AJAX refresh and grid/list view
- SEO category/subcategory and brand pages
- Product gallery/zoom, variants, stock, tabs, reviews, review images, Q&A,
  frequently bought together, related/similar/recent recommendations
- AJAX live search and search results for products/categories/brands
- New arrivals, best sellers and sale pages
- Session cart with live AJAX quantity/totals, remove, move-to-wishlist and coupons
- Customer wishlist with move-to-cart
- Secure COD checkout, standard/express delivery, Pakistan provinces,
  duplicate-submit protection, stock reduction and order creation
- Order confirmation and email-or-phone order tracking timeline
- Registration/login/logout, login throttling, password-reset token architecture
- Customer dashboard, orders, addresses, profile, reviews, questions,
  notifications and password change
- Contact, FAQ, shipping, return/refund, privacy, terms and cookie pages
- Blog categories/listing/posts, related posts and sharing
- Beauty routine quiz and rule-based recommendations

ADMIN INCLUDED
--------------
- Separate secure administrator authentication + throttling
- Dashboard cards, monthly revenue/orders, best sellers and low-stock alerts
- Product CRUD, images and variants
- Category/subcategory CRUD with image/status/sort/SEO data
- Brand CRUD with logo, website, featured/status controls
- Order management with payment/order status, courier, tracking, notes,
  status history, inventory restoration and customer notifications
- Customer management + account activation/deactivation
- Coupon CRUD including customer/category/product targeting and limits
- Review moderation, admin replies and approval notifications
- Product question answering/moderation
- Contact message management
- Newsletter subscriber list + CSV export
- Blog management
- Site settings for identity/contact/shipping/currency/social links/logo

SECURITY / QUALITY
------------------
- PDO with native prepared statements for user-controlled database operations
- password_hash/password_verify authentication
- Session ID regeneration and secure cookie options
- CSRF protection for important POST actions
- Output escaping helpers
- File MIME/type/size validation and randomized upload names
- Login lockout after repeated failures
- Role-protected admin/customer routes
- Stock validation, duplicate checkout token and transaction-based order placement
- Error/empty/loading states
- SEO-friendly rewrite routes, canonical/OG tags, Product/Organization/
  Breadcrumb/BlogPosting schema, sitemap and robots support
- Responsive rules for desktop/tablet/mobile including 375px-class screens

PAYMENTS
--------
Cash on Delivery is the active, complete initial payment flow as allowed by the
project specification. Easypaisa, JazzCash, card and bank transfer are shown as
integration-ready options but intentionally disabled until real merchant/gateway
credentials and APIs are supplied. No fake payment processing is included.

PASSWORD RESET
--------------
Reset tokens are generated, hashed in the database, expire after one hour and
are single-use. In this localhost/development build the reset URL is surfaced in
the success message so the flow can be tested without SMTP credentials. For a
public deployment, send the same URL through a configured transactional email
provider and do not display it in the browser.

VALIDATION PERFORMED IN BUILD ENVIRONMENT
-----------------------------------------
- PHP syntax lint: all PHP files passed (0 errors)
- JavaScript syntax: cart.js, catalog.js, main.js and search.js passed node check
- Seed admin password hash verified for Admin@12345
- Static checks performed for missing placeholder/TODO code and key local routes

Because this build environment does not provide a running MySQL server, final
end-to-end database execution must be run on XAMPP using setup-check.php after
importing the SQL. The code and SQL were cross-checked and PHP/JS syntax tested.

VERSION
-------
V5 completion package — 18 Aug 2026
