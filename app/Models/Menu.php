<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $table = 'menus';

    protected $fillable = ['name', 'active'];

    // public function employee(): HasMany
    // {
    //     return $this->hasMany(Employee::class, 'position_id');
    // }
}
