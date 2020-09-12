<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $table = "publishers";
    protected $fillable = ['name','created_at','updated_at'];
    public $timestamps = true;
}
