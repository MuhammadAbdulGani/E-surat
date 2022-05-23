<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Signatory extends Model
{
	use SoftDeletes;
    protected $table = 'signatories';
	
    protected $fillable = [
        'name', 'position'
    ];
}
