<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $table = 'shifts';

    protected $fillable = ['name', 'begin_time', 'end_time', 'active'];

    // public function employee(): HasMany
    // {
    //     return $this->hasMany(Employee::class, 'position_id');
    // }
}
