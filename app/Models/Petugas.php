<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'petugass';
    protected $fillable = ['kode', 'nama', 'email'];

    public function anggotas() {
        return $this->hasMany(Anggota::class);
    }

    public function bukus() {
        return $this->hasMany(Buku::class);
    }
}
