<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Invoice;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'data_barang';

    public function invoice(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}
