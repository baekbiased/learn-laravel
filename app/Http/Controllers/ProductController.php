<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{


    public function index(Request $request)
    {
//fhgfhgfhgfhg
        $request_min_price = $request->start_price;
        $request_max_price = $request->end_price;

        $min_price = Product::min('price');
        $max_price = Product::max('price');

        $min_module = $min_price % 10;
        $min_module = $min_price - $min_module;

        $values = [];
        for ($x = $min_module; $x <= $max_price; $x+=10) {
            array_push($values,$x);
        }
        array_push($values,$x);


//        $products = Product::filters($request->all())->get();

        if($request_min_price == 0 && $request_max_price == 0) {
            $products = Product::orderBy('price', 'ASC')->paginate(10);

        } else if ($request_max_price == 0) {
            $products = Product::where('price', '>=', $request_min_price)->orderBy('price', 'ASC')
                ->paginate(10);
            $products->appends(['start_price' => $request_min_price], ['end_price' => '0']);

        } else {
            $products = Product::where('price', '>=', $request_min_price)->orderBy('price', 'ASC')
                ->where('price', '<=', $request_max_price)
                ->paginate(10);
            $products->appends(['start_price' => $request_min_price]);
            $products->appends(['end_price' => $request_max_price]);

        }


        return view('pages.product.index', compact('products', 'values'));
    }

    public function create()
    {
        return view('pages.product.add');

    }


    public function store(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'price' => ['not_in:0','numeric'],

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->all());
        }


        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
        ]);
        Session::flash('success', 'Successfully Added');
        return redirect()->route('pages.product.show');

    }


    public function show(Product $product)
    {

    }


    public function edit(Product $product)
    {
        return view('pages.product.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'price' => ['not_in:0','numeric'],

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->all());
        }
        Product::updateOrCreate(
            ['id' => $product->id],
            [
                'name' => $request->name,
                'price' => $request->price,
                'image' => $request->image,
            ]
        );

        Session::flash('success', 'Successfully updated');
        return redirect()->route('product.index');
    }


    public function destroy(Product $product)
    {
//        dd($product);
        $product->delete();
        Session::flash('success', 'Successfully Deleted');
        return redirect()->route('product.index');
    }
}
