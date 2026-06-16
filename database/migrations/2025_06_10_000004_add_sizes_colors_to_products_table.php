<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'sizes')) {
                $table->json('sizes')->nullable()->after('stock_status');
            }
            if (!Schema::hasColumn('products', 'colors')) {
                $table->json('colors')->nullable()->after('sizes');
            }
            if (!Schema::hasColumn('products', 'is_popular')) {
                $table->boolean('is_popular')->default(false)->after('is_latest_drop');
            }
            if (!Schema::hasColumn('products', 'is_latest_drop')) {
                $table->boolean('is_latest_drop')->default(false)->after('category_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['sizes', 'colors', 'is_popular', 'is_latest_drop']);
        });
    }
};
