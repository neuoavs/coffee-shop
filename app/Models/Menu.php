<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $table = 'menus';

    protected $fillable = ['name'];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'menu_id');
    }
}
