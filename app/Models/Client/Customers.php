<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
// use Spatie\Activitylog\Traits\LogsActivity;

class Customers extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
//    use HasApiTokens;
    // use LogsActivity;
    protected $table = 'customers';
	protected $primaryKey = 'CustomerId';
    public $guarded=[];
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';
    const DELETED_AT = 'DeletedAt';



    public function cars()
    {
        //return $this->hasMany('App\Models\Client\CustomerCars','CustomerId','CustomerId');

        return $this->hasMany(CustomerCars::class, 'CustomerId');
    }
	
}
