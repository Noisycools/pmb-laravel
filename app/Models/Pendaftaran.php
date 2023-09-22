<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';
    protected $guarded = ['id'];


    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
