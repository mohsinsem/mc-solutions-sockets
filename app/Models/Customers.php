<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customers extends Model
{
    use HasFactory;
    use SoftDeletes;
    //use LogsActivity;
	protected $table = 'customers';
	protected $primaryKey = 'CustomerId';
    public $guarded=[];
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';
    const DELETED_AT = 'DeletedAt';


	public function payments($type = 1)
    {
        return $this->hasMany(Payments::class,'CustomerId','CustomerId')->where('ByAdmin', '=',0);
    }

	public function paymentMethods()
    {
        return $this->hasMany(CustomerPaymentMethod::class,'CustomerId','CustomerId');
    }

	public function countries()
    {
        return $this->hasMany(CustomerLoginCountries::class,'CustomerId','CustomerId');
    }

	public function blockIps()
    {
        return $this->hasMany(BlockedIp::class,'CustomerId','CustomerId');
    }

	public function country()
    {
        return $this->hasMany(Countries::class,'id','CountryId');
    }
    
	public function plan()
    {
        return $this->belongsTo(PricePlan::class,'PricePlanId','PricePlanId');
    }
	
	public function countryDetails()
    {
        return $this->belongsTo('App\Models\Countries','CountryId','id');
    }
}
