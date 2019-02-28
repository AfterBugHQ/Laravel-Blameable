<?php

namespace AfterBugHQ\Blameable;

trait Blameable
{
    /**
     * Return the blameable configuration array for this model.
     *
     * @return array
     */
    public function blameable(): array
    {
        return [
            'createdByAttribute' => 'created_by',
            'updatedByAttribute' => 'updated_by',
        ];
    }

    /**
     * Hook into the Eloquent model events to fill the
     * blameable attribute with the current user ID.
     */
    public static function bootBlameable()
    {
        static::observe(BlameableObserver::class);
    }
}
