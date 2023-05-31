<?php

namespace App\Models;
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;

    public function edulevels(){
        return $this->belongsTo('App\Edulevel');
    }
}
