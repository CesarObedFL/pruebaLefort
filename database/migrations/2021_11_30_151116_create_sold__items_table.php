<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id');//->constrained()->onDelete('cascade');
            $table->string('description', 255);
            $table->string('department', 30);
            $table->decimal('price', 17, 2);

        });

        DB::statement("ALTER TABLE sold_items ADD CONSTRAINT chk_department CHECK (department IN ('sports','home','beauty','food','pets'))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('sold_items', function (Blueprint $table) {
            $table->dropForeign('sale_id');
        });*/
        Schema::dropIfExists('sold_items');
    }
}
