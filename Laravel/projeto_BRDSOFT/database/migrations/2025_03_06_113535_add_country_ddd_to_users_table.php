<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{

        Schema::table('users', function (Blueprint $table) {
            
            $table->string('country', length: 100)->nullable();
            $table->string('ddd')->length(3)->nullable();

        });

    }

    public function down(): void{

        Schema::table('users', function (Blueprint $table) {
            
            $table->dropColumn('country');
            $table->dropColumn('ddd');

        });

    }

};