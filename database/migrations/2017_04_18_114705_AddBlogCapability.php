<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBlogCapability extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->longText('content')->nullable();
            $table->dateTime('published_date')->nullable();
            $table->boolean('draft')->default(true);
            $table->boolean('stickied')->default(false);
            $table->boolean('flagged')->default(false);
            $table->integer('rating')->default(0);
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('blog_post_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_dislikes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('blog_post_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('blog_post_id');
            $table->longText('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('users', function ($table) {
            $table->longText('avatar')->nullable();
            $table->boolean('restrict_blog_posting')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('blog_likes');
        Schema::dropIfExists('blog_dislikes');
        Schema::dropIfExists('blog_comments');

        Schema::table('users', function ($table) {
            $table->dropColumn('avatar');
            $table->dropColumn('restrict_blog_posting');
        });
    }
}
