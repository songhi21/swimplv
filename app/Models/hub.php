<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hub extends Model
{
    // use HasFactory;
    protected $table = "wsh";

    public $primaryKey = "id";

    public $timestamps = true;

}
