<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $guarded = ['id'];

    public function getALLMK(){
        return $this->all();
    }
}
