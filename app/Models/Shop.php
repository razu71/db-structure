<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
 
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->withPivot(['products_amount', 'price']) 
            ->withTimestamps();
    }

    public function productsSoldToday(): BelongsToMany 
    {
        return $this->belongsToMany(Product::class)
            ->wherePivotBetween('created_at', [now()->startOfDay(), now()->endOfDay()]);
    } 

    //wherePivot, wherePivotIn, 
    // wherePivotNotIn, wherePivotBetween, 
    // wherePivotNotBetween, wherePivotNull, and wherePivotNotNull.
}
