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
        // Schema::create('get_gender_function', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        DB::unprepared("
            CREATE FUNCTION getGenderCode(Code CHAR(1))
            RETURNS VARCHAR(20)
            DETERMINISTIC
            BEGIN 
                RETURN CASE 
                    WHEN code = 'L' THEN 'Laki-laki'
                    WHEN code = 'P' THEN 'Perempuan'
                    ELSE 'tidak diketahui'
                END;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('get_gender_function');
         DB::unprepared("DROP FUNCTION IF EXISTS getGenderCode");
    }
};
