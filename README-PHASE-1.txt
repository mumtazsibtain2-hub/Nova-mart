LUMÉA BEAUTY — PHASE 1
======================

1) Copy the "lumea-beauty" folder to:
   C:\xampp\htdocs\lumea-beauty

2) Start Apache and MySQL in XAMPP.

3) Open phpMyAdmin:
   http://localhost/phpmyadmin/

4) Import:
   database/lumea_beauty.sql

   IMPORTANT:
   The SQL file drops and recreates the database named "lumea_beauty".
   Do not import it over a database containing data you want to keep.

5) Open:
   http://localhost/lumea-beauty/setup-check.php

6) Then open:
   http://localhost/lumea-beauty/

Default development database configuration:
   Host: 127.0.0.1
   Port: 3306
   Database: lumea_beauty
   Username: root
   Password: [blank]

Default seeded admin for later admin phase:
   Email: admin@lumeabeauty.local
   Password: Admin@12345

Change the default admin password once the admin UI is implemented.

Phase 1 contains:
- Complete project folder scaffold
- Complete relational database schema
- 30 realistic sample cosmetic products
- 8 categories
- 24 subcategories
- 10 brands
- Product variants
- Sample coupons
- Blog categories
- Global settings
- PDO connection
- Session hardening
- Auth helpers
- CSRF helpers
- Escaping / URL / currency helpers
- Cart helper foundation
- Notification helper foundation
- Clean URL .htaccess rules
- Custom 404 page
- Environment/database setup checker

Phase 2 should implement:
- reusable header.php
- reusable footer.php
- premium global CSS
- responsive CSS
- main JavaScript
- announcement bar
- sticky navigation
- mobile navigation
- live-search UI shell
