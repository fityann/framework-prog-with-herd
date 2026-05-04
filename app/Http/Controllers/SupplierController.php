<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        // $suppliers = Supplier::all();
        // return view('supplier.index', compact('suppliers'));

        $query = Supplier::query();
        if ($request->filled('supplier_name')) {
            $query->where('supplier_name', 'like', '%' . $request->supplier_name . '%');
        }
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        $suppliers = $query->get();
        return view('supplier.index', compact('suppliers'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('supplier.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        // echo "Menyimpan data supplier";
        $request->validate([
            'supplier_code' => 'required|max:5',
            'supplier_name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ], [
            'supplier_code.required' => 'Kode supplier wajib diisi',
            'supplier_code.max' => 'Kode supplier maksimal 4 karakter',
            'supplier_name.required' => 'Nama supplier wajib diisi',
            'address.required' => 'Alamat wajib diisi',
            'phone.required' => 'No. Telepon wajib diisi'
        ]);
        $suppliers = Supplier::create($request->all());
        if($suppliers) {
            return redirect('/supplier')->with('success', 'Data Berhasil Disimpan');
        } else {
            return redirect('/supplier')->with('error', 'Data Gagal Disimpan');
        }
    }

    public function edit($id)
    {
        $suppliers = Supplier::find($id);
        return view('supplier.edit', compact('suppliers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_code' => 'required|max:5',
            'supplier_name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ],[
            'supplier_code.required' => 'Kode supplier wajib diisi',
            'supplier_code.max' => 'Kode supplier maksimal 4 karakter',
            'supplier_name.required' => 'Nama supplier wajib diisi',
            'address.required' => 'Alamat wajib diisi',
            'phone.required' => 'No. Telepon wajib diisi'
        ]);

        $suppliers = Supplier::find($id)->update($request->all());

        if($suppliers) {
            return redirect('/supplier')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect('/supplier')->with('error', 'Data Gagal Diupdate');
        }
    }

    public function destroy($id)
    {
        $suppliers = Supplier::find($id)->delete();
        if($suppliers) {
            return redirect('/supplier')->with('success', 'Data berhasil dihapus');
        }
    }
}
