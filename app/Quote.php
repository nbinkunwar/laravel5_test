<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    use SoftDeletes;

    protected $table = 'quotes';

    protected $fillable = ['quote', 'author', 'image'];

    protected $dates = ['deleted_at'];
}
