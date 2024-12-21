<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('user_type', ['seller', 'customer'])->default('customer')->after('name');
            $table->string('avatar', 150)->nullable()->after('remember_token');
            $table->text('shipping_info')->nullable()->after('avatar');
            $table->text('billing_info')->nullable()->after('shipping_info');
            $table->double('balance', 8, 2)->default(0.00)->after('billing_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_type');
            $table->dropColumn('avatar');
            $table->dropColumn('shipping_info');
            $table->dropColumn('billing_info');
            $table->dropColumn('balance');
        });
    }
};
