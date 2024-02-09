<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Pridáva stĺpec admin s predvolenou hodnotou 0
            $table->boolean('admin')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Odstráni stĺpec admin ak je migrácia vracaná späť
            $table->dropColumn('admin');
        });
    }
};
