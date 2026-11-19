<?php
declare(strict_types=1);
require_once __DIR__.'/includes/bootstrap.php';
$st=$pdo->query("SELECT p.*,b.name brand_name,COALESCE(SUM(CASE WHEN o.order_status='delivered' THEN oi.quantity ELSE 0 END),0) delivered_units
FROM products p LEFT JOIN brands b ON b.id=p.brand_id LEFT JOIN order_items oi ON oi.product_id=p.id LEFT JOIN orders o ON o.id=oi.order_id
WHERE p.is_active=1 GROUP BY p.id ORDER BY delivered_units DESC,p.average_rating DESC,p.created_at DESC LIMIT 12");
$products=$st->fetchAll();
$pageTitle='Best Sellers | Luméa Beauty';
require __DIR__.'/includes/header.php';?>
<section class="page-title"><span class="eyebrow">CUSTOMER FAVORITES</span><h1>Best Sellers</h1><p>Our most-loved beauty essentials, ranked by delivered orders and customer ratings.</p></section>
<section class="container" style="padding-bottom:70px">
<?php if(!$products):?><div class="empty"><h2>No best sellers yet.</h2><a class="btn primary" href="<?=url('/shop/')?>">Shop Beauty</a></div>
<?php else:?><div class="product-grid"><?php foreach($products as $product)require __DIR__.'/includes/product-card.php';?></div><?php endif;?>
</section><?php require __DIR__.'/includes/footer.php';?>
