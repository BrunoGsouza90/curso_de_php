<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{

        Schema::rename('snmp', 'oidsnmps');

    }

    public function down(): void{

        Schema::table('table', function (Blueprint $table){

            Schema::rename('oidsnmps', 'snmp');

        });

    }

};