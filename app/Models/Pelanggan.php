<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Faktur;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'data_pelanggan';

    public function faktur(): HasMany
    {
        return $this->hasMany(Faktur::class);
    }
}

