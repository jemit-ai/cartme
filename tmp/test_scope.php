<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Console\Kernel');
$kernel->bootstrap();

use App\Models\Product;

try {
    $product = Product::query()->country(1)->toSql();
    echo "SQL: " . $product . "\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
