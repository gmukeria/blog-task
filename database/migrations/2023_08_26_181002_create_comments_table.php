<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     * რეალურ პროექტში, comments ცხრილში text და user_id მექნებოდა,
     * დავამატებდი model_has_comments ცხრილს, model_type, model_id, comment_id კოლუმებით
     * - რაც შესაძლებლობას მოგვცემდა კომენტარები სხვადასხვა ადგილას გამოგვეყენებინა
     * მაგ: ტასკებზე, ვიდეოებზე, ფოტოებზე და ა.შ.
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('text', 240);
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('blog_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('blog_id')->references('id')->on('blogs')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
