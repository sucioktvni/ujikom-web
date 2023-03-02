<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang_aula extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    public $table = 'ruang_aulas';

    public $timestamps = true;
    
}
