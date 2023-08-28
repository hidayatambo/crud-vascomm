<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Customer::all();
            return DataTables::of($products)
                ->addColumn('status', function ($product) {
                    return $product->status ? true : false;
                })
                ->addColumn('action', function ($product) {
                    return '<button type="button" class="btn btn-sm edit-btn text-success" data-id="' . $product->id . '"><i class="fas fa-edit"></i></button>' .
                    '<button type="button" class="btn btn-sm delete-btn text-warning" data-id="' . $product->id . '"><i class="fas fa-trash"></i></button>'; 
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('admin.user');
    } 
    public function edit($id)
    {
        $user = Customer::find($id);
        return response()->json($user);
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:customers',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
        'password' => 'required|min:6|confirmed', // Validasi password dan konfirmasi password
        'status' => 'required',
    ]);

    $user = new Customer();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone_number = $request->phone;
    $user->password = Hash::make($request->password); // Simpan password yang telah di-hash
    $user->status = $request->status;

    $user->save();

    return response()->json(['message' => 'User berhasil ditambahkan.']);

}
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,'.$id,
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            // Add other validation rules accordingly
        ]);

        $user = Customer::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone;  
        // Update other fields accordingly
        $user->save();
        return redirect()->route('admin.user')->with('success', 'User berhasil diperbarui');
    }
    public function destroy($id)
    {
        $product = Customer::findOrFail($id);

        // Hapus gambar produk dari penyimpanan jika ada

        // Hapus data produk dari database
        $product->delete();

        return response()->json(['message' => 'Produk berhasil dihapus.']);
    }

}
