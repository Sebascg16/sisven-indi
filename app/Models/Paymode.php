<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymode extends Model
{
    use HasFactory;

    protected $table = 'paymodes';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
