<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'price',
        'image'
    ];



    public function scopeFilters($query, $request) {

        if(isset($request['start_price']) && $request['start_price'] !=0){
            $query->where('price', '>=', $request['start_price'] );
        }
        if(isset($request['end_price']) && $request['end_price'] !=0){
            $query->where('price', '<=', $request['end_price'] );
        }

        $query->orderBy('price');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getImageAttribute($value)
    {
        return asset("assets/images/uploads") . "/" . $value;
    }

}



