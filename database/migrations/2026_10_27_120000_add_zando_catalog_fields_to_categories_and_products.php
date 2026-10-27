<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (! Schema::hasColumn('categories', 'slug')) {
                $table->string('slug')->nullable()->unique();
            }

            if (! Schema::hasColumn('categories', 'image')) {
                $table->string('image')->nullable();
            }

            if (! Schema::hasColumn('categories', 'parent_id')) {
                $table->foreignId('parent_id')
                    ->nullable()
                    ->constrained('categories')
                    ->nullOnDelete();
            }

            if (! Schema::hasColumn('categories', 'sort_order')) {
                $table->unsignedInteger('sort_order')->default(0);
            }
        });

        Schema::table('products', function (Blueprint $table) {
            if (! Schema::hasColumn('products', 'base_price')) {
                $table->decimal('base_price', 10, 2)->default(0);
            }

            if (! Schema::hasColumn('products', 'is_featured')) {
                $table->boolean('is_featured')->default(false);
            }
        });

        // Keep the new catalog price aligned with the existing price column for current records.
        DB::table('products')->update(['base_price' => DB::raw('price')]);
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['base_price', 'is_featured']);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropUnique(['slug']);
            $table->dropColumn(['slug', 'image', 'parent_id', 'sort_order']);
        });
    }
};
