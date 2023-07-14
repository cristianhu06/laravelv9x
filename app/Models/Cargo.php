<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'cargos';

    protected $fillable = ['nombre'];

}
