<?php

namespace AfterBugHQ\Blameable\Tests\Models;

use AfterBugHQ\Blameable\Blameable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Blameable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];
}
