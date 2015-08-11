<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsSell extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conversion_messages', function(Blueprint $table)
        {
            $table->boolean('is_sell')->default(0)->after('conversion');
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
            $table->dropColumn('is_sell');
        });
    }

}
