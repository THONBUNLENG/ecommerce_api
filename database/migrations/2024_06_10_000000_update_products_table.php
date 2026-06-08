<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'slug')) {
                $table->string('slug')->unique()->nullable()->after('name');
            }
            if (!Schema::hasColumn('products', 'long_description')) {
                $table->text('long_description')->nullable()->after('description');
            }
            if (!Schema::hasColumn('products', 'original_price')) {
                $table->decimal('original_price', 10, 2)->nullable()->after('price');
            }
            if (!Schema::hasColumn('products', 'discount_price')) {
                $table->decimal('discount_price', 10, 2)->nullable()->after('original_price');
            }
            if (!Schema::hasColumn('products', 'stock_status')) {
                $table->string('stock_status')->default('in_stock')->after('stock_quantity');
            }
            if (!Schema::hasColumn('products', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('is_latest_drop');
            }
            if (!Schema::hasColumn('products', 'meta_title')) {
                $table->string('meta_title')->nullable()->after('is_active');
            }
            if (!Schema::hasColumn('products', 'meta_description')) {
                $table->string('meta_description')->nullable()->after('meta_title');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'slug',
                'long_description',
                'original_price',
                'discount_price',
                'stock_status',
                'is_active',
                'meta_title',
                'meta_description',
            ]);
        });
    }
};