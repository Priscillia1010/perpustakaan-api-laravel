<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggotas';
    protected $fillable = ['kode', 'nama', 'email'];

    public function petugass() {
        return $this->belongsTo(Petugas::class);
    }
}
