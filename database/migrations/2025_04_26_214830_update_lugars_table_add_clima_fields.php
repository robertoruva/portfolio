<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::table('lugars', function (Blueprint $table) {
			$table->char('codigo_pais', 2)->nullable()->after('pais');
			$table->decimal('latitud', 10, 7)->nullable(false)->change();
			$table->decimal('longitud', 10, 7)->nullable(false)->change();

			$table->float('temperatura_actual')->nullable();
			$table->integer('humedad')->nullable();
			$table->string('estado_clima')->nullable();
			$table->timestamp('ultima_actualizacion')->nullable();
		}); 
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		//
	}
};
