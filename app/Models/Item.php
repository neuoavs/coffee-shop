<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $table = 'items';

    protected $fillable = ['unit_id', 'name', 'image', 'price'];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
