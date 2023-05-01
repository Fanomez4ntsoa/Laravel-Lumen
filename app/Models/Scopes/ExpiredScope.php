<?php

namespace App\Models\Scopes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class ExpiredScope implements Scope
{
    public function __construct(
        protected bool $snake = false
    ) {
    }

    /**
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
     $table = $model->getTable();
     $this->applyToBuilder(builder: $builder, table: $table);  
    }

    public function applyToBuilder(EloquentBuilder|QueryBuilder $builder, string $table)
    {
        $now = Carbon::now();
        $validFrom = 'Valid_From';
        $validTill = 'Valid_Till';

        if($this->snake) {
            $validFrom = 'valid_from';
            $validTill = 'valid_till';
        }

        $builder
            ->where(function ($query) use ($now, $table, $validFrom, $validTill) {
                $query
                    ->where($table . '.' . $validFrom, '>', $now)
                    ->orWhere(function ($query) use ($now, $table, $validTill) {
                        $query
                            ->where($table . '.' . $validTill, '<', $now)
                            ->WhereNotNull($table . '.' . $validTill);
                    });
            });
    }
}