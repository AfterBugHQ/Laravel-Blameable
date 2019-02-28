<?php

namespace AfterBugHQ\Blameable\Tests\Models;

use AfterBugHQ\Blameable\Blameable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
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

    /**
     * Return the blameable configuration array for this model.
     *
     * @return array
     */
    public function blameable(): array
    {
        return [
            'createdByAttribute' => 'create_by',
            'updatedByAttribute' => 'update_by',
        ];
    }
}
