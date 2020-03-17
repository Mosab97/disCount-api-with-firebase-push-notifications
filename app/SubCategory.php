<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name', 'coupon','url', 'discount',  'image',

    ];
    protected $appends = [
        'CategoryName'
    ];



    public function getCategoryNameAttribute(){

        return  Category::where('id',$this->category_id)->get()->pluck('name')->toArray();

    }


    public function categories(){

        return $this->belongsTo(Category::class);
    }










}
