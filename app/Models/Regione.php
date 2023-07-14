<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'regiones';

    protected $fillable = ['region'];
	
}
