<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Position extends Model
{

    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $table = 'positions';

    protected $fillable = ['name', 'active'];

    public function employee(): HasMany
    {
        return $this->hasMany(Employee::class, 'position_id');
    }
}
