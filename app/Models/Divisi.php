<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'divisi';
    protected $primaryKey = 'id_divisi';
    public $timestamps = false;

    protected $fillable = ['nama_divisi'];

    public function anggotas()
    {
        return $this->hasMany(Anggota::class, 'divisi_id', 'id_divisi');
    }
}
