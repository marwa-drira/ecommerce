<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'total', 'dateCommande', 'clientID'
    ];
    public function clients()
    {
        return $this->belongsTo(Client::class, "clientID");
    }
    public function ligneCommandes()
    {
        return $this->hasMany(LigneCommande::class, "commandeeID");
    }
}
