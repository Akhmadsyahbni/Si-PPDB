<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    use HasFactory;
    public $table = "ppdb";

    protected $fillable = ['start_date', 'end_date'];
}
