<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'prenom', 'adress', 'email', 'password',
        'role'
    ];
    public function commandes()
    {
        return $this->hasMany(Commande::class, "clientID");
    }
}
