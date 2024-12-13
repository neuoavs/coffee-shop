<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $table = 'products';

    protected $fillable = ['menu_id','name', 'image', 'cost'];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
