<?php 

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Carbon;

class UnexpiredScope implements Scope
{
    public function __construct(
        protected string $startColumn = 'Valid_From',
        protected string $endColumn = 'Valid_Till'
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

    public function applyToBuilder(EloquentBuilder|QueryBuilder $builder, string $table, string $startColumn = null, string $endColumn = null ) 
    {
        $now = Carbon::now();
        $startColumn = $startColumn ?? $this->startColumn;
        $endColumn = $endColumn ?? $this->endColumn;
        
        $builder
            ->where(function ($query) use ($now, $table, $startColumn, $endColumn) {
                $query
                    ->where(function ($query) use ($now, $table, $startColumn) {
                        $query
                            ->where($table . '.' . $startColumn, '<=', $now)
                            ->orWhereNull($table . '.' . $startColumn);
                    })
                    ->where(function ($query) use ($now, $table, $endColumn) {
                        $query
                            ->where($table . '.' . $endColumn, '>=', $now)
                            ->orWhereNull($table . '.' . $endColumn);
                    });
            });
    }
}
