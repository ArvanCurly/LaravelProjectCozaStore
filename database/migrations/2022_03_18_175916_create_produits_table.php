<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->json('image');
            $table->json('taille');
            $table->json('couleur');
            $table->decimal('prix',8,2);
            $table->string('material');
            $table->string('dimension');
            $table->string('poid');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
            ->references('id')
            ->on('types')
            ->onDelete('restrict')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
