<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamRuang extends Model
{
    use HasFactory;
    public function Ruang (){
        return $this->belongsTo('App\Models\Ruang','ruang_id');
    }
}
