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
    Schema::create('food', function (Blueprint $table) {
        $table->id();
        $table->string('name');          // ឈ្មោះអាហារ
        $table->string('image')->nullable(); // រូបភាព
        $table->decimal('price', 15, 0);  // តម្លៃ
        $table->text('description')->nullable(); // ការពិពណ៌នា
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
