<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $table ='categories';
   protected $primaryKey ='id';
    public $timestamps =false;
    protected $fillable = ['name', 'descripcion'];
}
