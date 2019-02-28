<?php

namespace AfterBugHQ\Blameable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class BlameableObserver
{
    /**
     * @param Model $model
     */
    public function creating(Model $model)
    {
        $this->setBlameableColumn($model, 'created');
    }

    /**
     * @param Model $model
     */
    public function updating(Model $model)
    {
        $this->setBlameableColumn($model, 'updated');
    }

    /**
     * Get the created/updated-by column.
     *
     * @param Model|Blameable $model
     * @param string $event (created|updated)
     * @return null
     */
    private function getColumn(Model $model, string $event)
    {
        $attribute = "{$event}ByAttribute";

        return Arr::get($model->blameable(), $attribute);
    }

    /**
     * @param Model $model
     * @param string $event
     */
    protected function setBlameableColumn(Model $model, string $event)
    {
        if (($column = $this->getColumn($model, $event)) && ($user = Auth::user())) {
            $model->{$column} = $user->getAuthIdentifier();
        }
    }
}
