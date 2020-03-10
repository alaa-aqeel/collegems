<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tranining extends Model
{
    protected $fillable = [
        'text', 'at' ,'support'
    ];

    
    public function getAt() {
        return \Carbon\Carbon::parse($this->at)->format('Y-m-d');
    }
}
