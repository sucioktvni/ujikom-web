<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;
    public function PinjamRuang (){
        return $this->hasMany('App\Models\PinjamRuang','ruang_id');
    }

    public function image()
    {
        if ($this->image && file_exists(public_path('image/ruang/' . $this->image))) {
            return asset('image/ruang/' . $this->image);
        } else {
            return asset('image/no_image.png');
        }
    }

    public function deleteImage()
    {
        if ($this->image && file_exists(public_path('image/ruang/' . $this->image))) {
            return unlink(public_path('image/ruang/' . $this->image));
        }

    }
}
