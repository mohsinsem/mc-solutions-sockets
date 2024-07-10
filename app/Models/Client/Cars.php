<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;
    protected $table = 'cars';
	protected $primaryKey = 'CarId';
	public $timestamps = false;
	public $deleted = false;


	public function option()
    {
        return $this->hasMany(CarsOptions::class, 'CarOptionId');
    }

	
}
