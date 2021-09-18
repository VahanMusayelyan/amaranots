<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;


class LanguageScope implements Scope
{
    /**
     * @param Builder $builder
     * @param Model $model
     * @param null $lang
     * @param null $table
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where("lang", app()->getLocale());
    }
}
