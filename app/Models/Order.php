<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kota(): BelongsTo
    {
        return $this->belongsTo(Kota::class, 'kota_id', 'id');
    }

    public function ekspedisi(): BelongsTo
    {
        return $this->belongsTo(Ekspedisi::class, 'ekspedisi_id', 'id');
    }
}
