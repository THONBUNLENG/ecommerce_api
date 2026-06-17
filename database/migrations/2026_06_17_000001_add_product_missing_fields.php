<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'weight')) {
                $table->decimal('weight', 8, 2)->nullable()->after('stock_status');
            }
            if (!Schema::hasColumn('products', 'dim_l')) {
                $table->decimal('dim_l', 8, 2)->nullable()->after('weight');
            }
            if (!Schema::hasColumn('products', 'dim_w')) {
                $table->decimal('dim_w', 8, 2)->nullable()->after('dim_l');
            }
            if (!Schema::hasColumn('products', 'dim_h')) {
                $table->decimal('dim_h', 8, 2)->nullable()->after('dim_w');
            }
            if (!Schema::hasColumn('products', 'manufacturer')) {
                $table->string('manufacturer')->nullable()->after('dim_h');
            }
            if (!Schema::hasColumn('products', 'drop_shipper')) {
                $table->string('drop_shipper')->nullable()->after('manufacturer');
            }
            if (!Schema::hasColumn('products', 'extended_specs')) {
                $table->text('extended_specs')->nullable()->after('drop_shipper');
            }
            if (!Schema::hasColumn('products', 'search_words')) {
                $table->string('search_words')->nullable()->after('extended_specs');
            }
            if (!Schema::hasColumn('products', 'waist_sizes')) {
                $table->json('waist_sizes')->nullable()->after('sizes');
            }
            if (!Schema::hasColumn('products', 'is_recommended')) {
                $table->boolean('is_recommended')->default(false)->after('is_active');
            }
            if (!Schema::hasColumn('products', 'gift_wrap')) {
                $table->boolean('gift_wrap')->default(false)->after('is_recommended');
            }
            if (!Schema::hasColumn('products', 'back_order')) {
                $table->boolean('back_order')->default(false)->after('gift_wrap');
            }
            if (!Schema::hasColumn('products', 'custom_1')) {
                $table->string('custom_1')->nullable()->after('search_words');
            }
            if (!Schema::hasColumn('products', 'custom_2')) {
                $table->string('custom_2')->nullable()->after('custom_1');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'weight',
                'dim_l',
                'dim_w',
                'dim_h',
                'manufacturer',
                'drop_shipper',
                'extended_specs',
                'search_words',
                'waist_sizes',
                'is_recommended',
                'gift_wrap',
                'back_order',
                'custom_1',
                'custom_2',
            ]);
        });
    }
};
