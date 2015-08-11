<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConversionField extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conversion_messages', function(Blueprint $table)
        {
            $table->decimal('conversion',10,4)->after('originatingCountry')->nullable()->defeult('NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conversion_messages', function(Blueprint $table)
        {
            $table->dropColumn('conversion');
        });
    }

}
