<?php
declare(strict_types=1);
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/database.php';

$requiredExtensions=['pdo','pdo_mysql','session','fileinfo','json','mbstring'];
$requiredTables=['admins','customers','password_reset_tokens','customer_addresses','categories','subcategories','brands','products','product_images','product_variants','carts','cart_items','wishlists','wishlist_items','coupons','coupon_products','coupon_categories','orders','order_items','order_status_history','coupon_usage','reviews','product_questions','notifications','contact_messages','newsletter_subscribers','blog_categories','blog_posts','recently_viewed','product_views','beauty_quiz_responses','settings'];
$uploadDirs=['uploads','uploads/products','uploads/reviews','uploads/brands','uploads/blog','uploads/categories'];
$checks=[];
$checks[]=['PHP 8.0+',version_compare(PHP_VERSION,'8.0.0','>='),'Running '.PHP_VERSION];
foreach($requiredExtensions as $ext){$checks[]=['PHP extension: '.$ext,extension_loaded($ext),extension_loaded($ext)?'Loaded':'Enable it in php.ini'];}
foreach($uploadDirs as $dir){$path=__DIR__.'/'.$dir;$checks[]=['Writable: '.$dir,is_dir($path)&&is_writable($path),is_dir($path)?(is_writable($path)?'Writable':'Not writable'):'Directory missing'];}

$dbOkay=false;$dbMessage='';$missingTables=[];$counts=[];$adminSeed=false;
try{
    $pdo=Database::connection();
    $pdo->query('SELECT 1');
    $dbOkay=true;
    $dbMessage='Connected to '.DB_NAME.'.';
    $existing=$pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
    $missingTables=array_values(array_diff($requiredTables,$existing));
    foreach(['products','categories','brands','customers','orders','reviews','coupons','blog_posts'] as $table){
        if(in_array($table,$existing,true)){$counts[$table]=(int)$pdo->query("SELECT COUNT(*) FROM `$table`")->fetchColumn();}
    }
    if(in_array('admins',$existing,true)){$adminSeed=(bool)$pdo->query("SELECT 1 FROM admins WHERE email='admin@lumeabeauty.local' LIMIT 1")->fetchColumn();}
}catch(Throwable $e){$dbMessage=$e->getMessage();}

$checks[]=['Database connection',$dbOkay,$dbMessage];
$checks[]=['Complete database schema',$dbOkay&&$missingTables===[],$missingTables?'Missing: '.implode(', ',$missingTables):'All '.count($requiredTables).' required tables found'];
$checks[]=['Seed administrator',$adminSeed,$adminSeed?'admin@lumeabeauty.local found':'Import database/lumea_beauty.sql'];
$all=!in_array(false,array_column($checks,1),true);
function h(string $v):string{return htmlspecialchars($v,ENT_QUOTES,'UTF-8');}
?><!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Luméa Beauty Setup Check</title><style>body{font-family:Arial,sans-serif;background:#fff9f7;padding:35px;color:#222}.wrap{max-width:980px;margin:auto;background:#fff;padding:30px;border-radius:20px;box-shadow:0 15px 45px #6d263d16}h1,h2{color:#6d263d}.row{display:grid;grid-template-columns:1.3fr .35fr 1.6fr;gap:15px;align-items:center;border-bottom:1px solid #eee;padding:12px}.ok{color:#157347}.bad{color:#b02a37}.muted{color:#666;font-size:13px}.grid{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-top:20px}.card{background:#f8e8eb;padding:18px;border-radius:12px;text-align:center}.card strong{display:block;font-size:26px;color:#6d263d}.actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:24px}.btn{display:inline-block;padding:11px 16px;border-radius:10px;background:#6d263d;color:#fff;text-decoration:none}.btn.alt{background:#d98c9a}@media(max-width:700px){body{padding:14px}.wrap{padding:18px}.row{grid-template-columns:1fr auto}.row .muted{grid-column:1/-1}.grid{grid-template-columns:repeat(2,1fr)}}</style></head><body><div class="wrap"><h1>Luméa Beauty — Final Setup & Runtime Check</h1><p>This page validates the PHP runtime, database schema, seed administrator and writable upload folders required by the complete store.</p><?php foreach($checks as [$label,$passed,$detail]):?><div class="row"><span><?=h($label)?></span><strong class="<?=$passed?'ok':'bad'?>"><?=$passed?'PASS':'FAIL'?></strong><span class="muted"><?=h((string)$detail)?></span></div><?php endforeach;?><?php if($dbOkay&&$counts):?><h2>Database snapshot</h2><div class="grid"><?php foreach($counts as $key=>$value):?><div class="card"><strong><?=$value?></strong><?=h(ucwords(str_replace('_',' ',$key)))?></div><?php endforeach;?></div><?php endif;?><h2 class="<?=$all?'ok':'bad'?>"><?=$all?'READY — CORE RUNTIME REQUIREMENTS PASSED':'SETUP NEEDS ATTENTION'?></h2><p class="muted">For a clean XAMPP install, import <strong>database/lumea_beauty.sql</strong> first. Cash on Delivery is the fully active payment method; external payment gateways require real merchant credentials.</p><div class="actions"><a class="btn" href="<?=BASE_URL?>/">Open Store</a><a class="btn alt" href="<?=BASE_URL?>/admin/login.php">Admin Login</a></div></div></body></html>
