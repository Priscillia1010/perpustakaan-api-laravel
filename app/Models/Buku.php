<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $fillable = ['kode', 'judul', 'stock'];

    public function petugass() {
        return $this->belongsTo(Petugas::class);
    }
}
