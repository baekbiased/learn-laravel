<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'price',
        'image'
    ];

    public function scopeFilters($query, $request) {

//        if (isset($request->end_price)) {
//            $query::where('price', '>=', $request->start_price);
//            $query->appends(['start_price' => $request->start_price], ['end_price' => '0']);
//        }
//        if (isset($request->start_price) && isset($request->end_price)) {
//            $query::where('price', '>=', $request->start_price)
//                ->where('price', '<=', $request->end_price);
//            $query->appends(['start_price' => $request->start_price]);
//            $query->appends(['end_price' => $request->end_price]);
//        }
//        $query->orderBy('price', 'ASC');
    }
}

