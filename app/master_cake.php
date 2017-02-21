<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_cake extends Model
{
    public function class(){
    	return $this->hasMany('\App\cake','code_cake','name');
    }
}
