<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produits extends Model
{
    use HasFactory;
    protected $fillable= ['libelle','prix','quantite','description','chemin','categorie_id'];
    /**
     * Get the cathegorie that owns the produits
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(categorie::class, 'categorie_id');
    }

    /**
     * Get all of the comments for the produits
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class, 'produits_id');
    }
}

