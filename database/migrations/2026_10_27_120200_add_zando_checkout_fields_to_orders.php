<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (! Schema::hasColumn('orders', 'total_amount')) {
                $table->decimal('total_amount', 10, 2)->default(0);
            }

            if (! Schema::hasColumn('orders', 'payment_status')) {
                $table->enum('payment_status', ['pending', 'paid'])->default('pending');
            }

            if (! Schema::hasColumn('orders', 'order_status')) {
                $table->enum('order_status', ['processing', 'shipping', 'completed', 'cancelled'])
                    ->default('processing');
            }

            if (! Schema::hasColumn('orders', 'shipping_address')) {
                $table->text('shipping_address')->nullable();
            }
        });

        DB::table('orders')->update(['total_amount' => DB::raw('total')]);
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['total_amount', 'payment_status', 'order_status', 'shipping_address']);
        });
    }
};
