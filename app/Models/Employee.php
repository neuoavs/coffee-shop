<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $dateFormat = 'YYYY-MM-DD';
    protected $fillable = ['position_id','password', 'full_name', 'nick_name', 'birthday', 'citizen_identification', 'phone_number', 'salary_coefficient'];

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
