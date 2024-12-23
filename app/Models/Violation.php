<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $table = 'violations';

    protected $fillable = ['name', 'fine_amount', 'active'];

    // public function employee(): HasMany
    // {
    //     return $this->hasMany(Employee::class, 'position_id');
    // }
}
