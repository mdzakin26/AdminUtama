<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama', 'jenis_barang_id', 'stok', 'harga'];

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class);
    }
}
