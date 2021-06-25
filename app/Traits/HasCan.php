<?php
namespace App\Traits;

Trait HasCan
{
    public function getCanAttribute()
    {
        $currentUser = request()->user();

        return[
            'view' => $currentUser->can('view', $this),
            'create' => $currentUser->can('create', $this),
            'update' => $currentUser->can('update', $this),
        ];
    }
}