<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blank extends Model
{
    use HasFactory;
    protected $table = "blank";
    public $timestamps = false;
    // protected $primaryKey = 'id';
    protected $fillable = [
        'nomor_sekolah',
        'sekolah',
        'tahun',
    ];


}
