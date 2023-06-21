<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cathegorie extends Model
{
    use HasFactory;
    protected $fillable= ['CATHEGORIE'];

    /**
     * Get all of the comments for the cathegorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produits(): HasMany
    {
        return $this->hasMany(produits::class, 'cathegorie_id');
    }
}
