<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'pricePerMonth',
        'pricePerYear',
        'integrationsLimit',
        'productsLimit',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'packageId');
    }
}
