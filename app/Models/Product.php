<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function casts(): array
    {
        return [
            'price' => 'float',
        ];
    }

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function shops()
    {
        return $this->belongsToMany(Shop::class)
            ->withPivot('products_amount');
    }

    public function inventories(): HasMany
    {
        return $this->hasMany(ProductInventory::class);
    }
}
