<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ScopeUpdatedAt implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        // 最終更新⽇が３年以内
        $builder->where('updated_at', '>=', now()->subYears(3));
    }
}
