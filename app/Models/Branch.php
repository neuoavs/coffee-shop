<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $table = 'branches';

    protected $fillable = [ 'name', 'address', 'province', 'district', 'ward', ];
}
