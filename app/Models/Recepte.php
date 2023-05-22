<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepte extends Model
{
    protected $table = 'receptes';

    protected $fillable = ['pacvards', 'zalnos','zaldaudz'];
}
