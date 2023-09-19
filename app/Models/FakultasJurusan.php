<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakultasJurusan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fakultas_jurusan';

    protected $guarded = ['id'];

    public function programStudi()
    {
        return $this->hasMany(ProgramStudi::class);
    }
}
