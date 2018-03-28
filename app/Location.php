<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable=[
'location'
    ];
protected $table = "locations";
public function user()

	{
	
	return $this->belongsTo('App\User');		
	}

}
