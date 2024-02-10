<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalPriceAndStatusToCartsTable extends Migration
{
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->decimal('total_price', 10, 2)->default(0)->after('user_id');
            $table->string('status')->default('active')->after('total_price'); // Pridá stĺpec 'status' s predvolenou hodnotou 'active'
        });
    }

    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn(['total_price', 'status']);
        });
    }
}
