<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsOptions extends Model
{
    use HasFactory;
    protected $table = 'cars_options';
	protected $primaryKey = 'CarOptionId';
	public $timestamps = false;
	public $deleted = false;


	public function model()
    {
        return $this->hasMany(CarsOptions::class, 'CarOptionId', 'CarId');
    }

    public function car(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cars::class, 'CarId', 'CarId');
    }
}
