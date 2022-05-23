<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submission_outs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id');
            $table->string('number')->nullable();
            $table->json('data');
            $table->tinyInteger('approval_status');
            $table->timestamp('approval_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submission_outs');
    }
}
