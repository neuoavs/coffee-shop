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

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'menu_id');
    }
}
