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
        Schema::create('ligne_commandes', function (Blueprint $table) {
            $table->id();
            $table->float('quantitecommandee');
            $table->float('totligne');
            $table->unsignedBigInteger('commandeID');
            $table->foreign('commandeID')
                ->references('id')
                ->on('commandes')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedBigInteger('articleID');
            $table->foreign('articleID')
                ->references('id')
                ->on('articles')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_commandes');
    }
};
