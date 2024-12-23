<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $table = 'units';

    protected $fillable = ['name', 'active'];

    // public function employee(): HasMany
    // {
    //     return $this->hasMany(Employee::class, 'position_id');
    // }
}
