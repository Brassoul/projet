<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class commentaire extends Model
{
    use HasFactory;
    protected $fillable= ['mail','commentaire','produits_id', 'users_id'];

    public function produit(): BelongsTo
    {
        return $this->belongsTo(produits::class, 'produits_id');
    }

    /**
     * Get the user that owns the commentaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');

    }
}
