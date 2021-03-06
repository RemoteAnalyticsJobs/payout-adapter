<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayoutAdapterBankAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payout_adapter_bank_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('type');
            $table->unsignedBigInteger('user_id');
            $table->json('bank_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payout_adapter_bank_accounts');
    }
}
