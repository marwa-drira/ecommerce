<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantitecommandee', 'totligne', 'commandeID', 'articleID'
    ];
    public function commandes()
    {
        return $this->belongsTo(Commande::class, "commandeID");
    }
    public function articles()
    {
        return $this->belongsTo(Article::class, "articleID");
    }
}
