<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('post_pk', true);
            $table->string('post_rubrik');
            $table->text('post_text');
            $table->integer('post_fk')->nullable()->default(-1);
            $table->string('course_fk');
            $table->timestamp('created_at')->useCurrent();
            $table->integer('upvotes')->default(0);
            $table->string('user_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
