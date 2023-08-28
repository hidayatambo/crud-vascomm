<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;


class ProdukController extends Controller
{
   public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::all();
            return DataTables::of($products)
                ->addColumn('image', function ($product) {
                    return $product->image
                        ? '<img src="' . asset('storage/' . $product->image) . '" alt="Gambar Produk" class="img-fluid" style="max-width: 100px;">'
                        : 'Tidak ada gambar';
                })
                ->addColumn('status', function ($product) {
                    return $product->status ? true : false;
                })
                ->addColumn('action', function ($product) {
                    return '<button type="button" class="btn btn-sm edit-btn text-success" data-id="' . $product->id . '"><i class="fas fa-edit"></i></button>' .
                    '<button type="button" class="btn btn-sm delete-btn text-warning" data-id="' . $product->id . '"><i class="fas fa-trash"></i></button>'; 
                })
                ->rawColumns(['image', 'status', 'action'])
                ->make(true);
        }

        return view('admin.produk');
    } 
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;

        // Remove non-numeric characters from price and convert to integer
        $price = str_replace(['Rp ', '.', ','], '', $request->price);
        $product->price = (int) $price;

        $product->status = $request->status;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return response()->json(['message' => 'Produk berhasil ditambahkan.']);
    }
    


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        // Update other fields accordingly
        $product->status = $request->status; // Update status field
        $price = str_replace(['Rp ', '.', ','], '', $request->price);
        $product->price = (int) $price;


        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
        }

        $product->save();
        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus gambar produk dari penyimpanan jika ada
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        // Hapus data produk dari database
        $product->delete();

        return response()->json(['message' => 'Produk berhasil dihapus.']);
    }
}
