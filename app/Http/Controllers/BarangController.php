<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Providers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("content.admin.barang.manage-barang");
    }

    public function datatable(Request $request){
        $data = Products::where('type', 'barang');

        return DataTables::of($data)->make();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('content.admin.barang.manage-barang-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Products::Create([
            'provider_id'   => $request->provider_id,
            'name'          => $request->name,
            'price'         => $request->price,
            'decsription'   => $request->decsription,
            'type'          => 'barang',
            'image'         => null
        ]);

        return redirect()->back()->with("success","Berhasil mengedit data!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['barang'] = Products::findOrFail($id);

        return view('content.admin.barang.manage-user-edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Products::findOrFail($id)->update([
            'provider_id'   => $request->provider_id,
            'name'          => $request->name,
            'price'         => $request->price,
            'decsription'   => $request->decsription,
            'type'          => 'barang',
            'image'         => null
        ]);

        return redirect()->back()->with("success","Berhasil mengupdate data!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Products::findOrFail($id)->delete();

        return redirect()->back()->with("success","Berhasil menghapus data!");    
    }
}