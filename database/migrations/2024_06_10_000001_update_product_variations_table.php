<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('product_variations', function (Blueprint $table) {
            $table->integer('stock_quantity')->default(0)->after('color_id');
            $table->decimal('price_adjustment', 10, 2)->default(0)->after('stock_quantity');
        });
    }

    public function down(): void
    {
        Schema::table('product_variations', function (Blueprint $table) {
            $table->dropColumn(['stock_quantity', 'price_adjustment']);
        });
    }
};