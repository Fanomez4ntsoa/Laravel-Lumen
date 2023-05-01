<?php

namespace App\Models;

use App\Models\Scopes\UnexpiredScope;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'User';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = 'User_Id';

    /**
     * Indicates if the model should be timestampted
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'Login',
        'Password',
        'FirstName',
        'LastName',
        'Valid_From',
        'Valid_Till',
        'isValid',
        'Token',
        'Group_Id',
        'Token_Valid_From',
        'Token_Valid_Till',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    protected $hidden = [
        'Password',
        'Token',
        'Token_Valid_From',
        'Token_Valid_Till',
    ];

    /**
     * The attributes that should be cast
     *
     * @var array
     */
    protected $casts = [
        'Valid_From'        => 'datetime',
        'Valid_Till'        => 'datetime',
        'Token_Valid_From'  => 'datetime',
        'Token_Valid_Till'  => 'datetime',
        'isValid'           => 'boolean',
        'Group_Id'          => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->Valid_From = $model->freshTimestamp();
        });
    }

    protected static function booted()
    {
        static::addGlobalScope(new UnexpiredScope());
    }
}
