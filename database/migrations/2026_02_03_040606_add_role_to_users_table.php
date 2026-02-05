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
            // បន្ថែម Column role ហើយឱ្យវាស្ថិតនៅបន្ទាប់ពី Password
            // កំណត់ឱ្យវា default ជា 'user'
            $table->string('role')->default('user')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // លុប Column role វិញប្រសិនបើមានការ Rollback
            $table->dropColumn('role');
        });
    }
};
