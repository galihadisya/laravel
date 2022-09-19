<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|min:3|max:30',
            'price' => 'required|min:3',
            'stock' => 'required'
        ]);
        Product::create($request->all()); //tidak disarankan karena apabila urutan di create diubah maka data yang masuk ke tabel menjadi kacau
        //hanya gunakan request all ketika data di db dengan di web sudah sama(urutan inputan sesuai dengan urutan tabel di db)
        // Product::create([
        //     // 'dari tabel' => $request->dari name di create.blade.php
        //     'product_name' => $request->product_name,
        //     'price' => $request->price,
        //     'stock' => $request->stock
        // ]);

        //return back();
         return redirect('/products'); //apabila ingin melihat barang yg sudah ditambahkan
    }

    public function viewProducts()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrfail($id); // findOrfail untuk menampilkan 1 data saja, where lebih ke banyak data
        // $product = Product::where('id', $id)->first(); //first untuk menampilkan 1 data saja, get untuk semua data
        //dd($product); untuk debugging dan melihat error
        return view('edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Product::where('id', $id)->update([
        //     'product_name' => $request->product_name,
        //     'price' => $request->price,
        //     'stock' => $request->stock
        // ]);
        Product::findOrfail($id)->update($request->all());

        return redirect('/products');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }
}

