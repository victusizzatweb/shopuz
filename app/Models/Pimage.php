<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pimage extends Model
{
    use HasFactory;
    public $table='pimage';
    protected $guarded = ['id'];
    public $timestamps = false;
}
