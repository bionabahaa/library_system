<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $fillable = ['book_name','book_author','Description','ISBN','barcode','key_words','publisher_id','category_id'
        ,'created_at','updated_at'
    ];
    public $timestamps = true;


    public function category()
    {

        return $this ->belongsTo('App\Models\Models\Category','category_id','id');
    }


    public function publisher()
    {

        return $this ->belongsTo('App\Models\Models\Publisher','publisher_id','id');
    }
}


