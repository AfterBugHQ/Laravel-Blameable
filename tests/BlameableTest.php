<?php

namespace AfterBugHQ\Blameable\Tests;

use AfterBugHQ\Blameable\Tests\Models\Post;
use AfterBugHQ\Blameable\Tests\Models\Article;
use AfterBugHQ\Blameable\Tests\Models\CustomBlameableModel;

class BlameableTest extends TestCase
{
    public function testCreatedByAttribute()
    {
        $model = Post::create(['title' => 'This is a test']);

        $this->assertEquals($this->user->id, $model->created_by);
    }

    public function testUpdatedByAttribute()
    {
        $model = Post::create(['title' => 'This is a test']);

        $model->update(['title' => 'New Title']);
        $this->assertEquals($this->user->id, $model->updated_by);
    }

    public function testCustomCreatedByAttribute()
    {
        $model = CustomBlameableModel::create(['title' => 'This is a test']);

        $this->assertEquals($this->user->id, $model->created_by);
    }

    public function testNullUpdatedByAttribute()
    {
        $model = CustomBlameableModel::create(['title' => 'This is a test']);

        $model->update(['title' => 'New Title']);
        $this->assertEquals(null, $model->updated_by);
    }

    public function testCustomUpdatedByAttribute()
    {
        $model = Article::create(['title' => 'This is a test']);

        $model->update(['title' => 'New Title']);
        $this->assertEquals($this->user->id, $model->update_by);
    }
}
