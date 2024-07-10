<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Setting extends Model
{
    use HasFactory;
    //use LogsActivity;

    public $guarded=[];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Setting was {$eventName}";
    }
}
