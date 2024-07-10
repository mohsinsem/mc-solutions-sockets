<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerCars extends Model
{
    use HasFactory;
    protected $table = 'customers_cars';
	protected $primaryKey = 'Id';
	public $timestamps = false;
	public $deleted = false;

	protected $fillable = [
        'CustomerId', // Add CustomerId here
        'CarId',
		'CarOptionId'
    ];


	public function car()
    {
        //return $this->hasMany('App\Models\Client\CustomerCars','CustomerId','CustomerId');

        return $this->belongsTo(Cars::class, 'CarId','CarId');
    }public function customer()
    {
        return $this->belongsTo(Customers::class, 'CustomerId','CustomerId');
    }

    public function carOption():HasMany{
        return $this->hasMany(CarsOptions::class,'CarOptionId','CarOptionId');
    }
}
