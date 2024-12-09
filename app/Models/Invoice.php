<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Faktur;
use App\Models\Barang;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';

    public function faktur(): BelongsTo
    {
        return $this->belongsTo(Faktur::class);
    }

    public function data_barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
}
