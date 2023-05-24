<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class Role extends Model
{
    public $table = 'roles';

    public $fillable = [
        'name',
        'display_name',
        'guard_name'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'display_name' => 'string',
        'guard_name' => 'string',
        'created_by' => 'integer',
        'status' => 'integer'
    ];

    public static array $rules = [
        'name' => 'required|string|min:4',
        'display_name' => 'required|string|min:4',
        'guard_name' => 'required|string|min:4',
        'created_by' => 'required',
        'status' => 'required',
        'deleted_at' => 'required'
    ];

    protected static function boot()
    {   dd(Auth::id());
        parent::boot();
        static::creating(function (self $item) {
            $item->created_by = Auth::id();
        });
    }
    
}
