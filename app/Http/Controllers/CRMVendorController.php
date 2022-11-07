<?php

namespace App\Http\Controllers;

use App\Models\CRMVendor;
use Illuminate\Http\Request;

class CRMVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.vendor.vendor', [
            'title' => 'Vendor',
            'vendor' => CRMVendor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.vendor.vendorCreate', [
            'title' => 'Vendor'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:c_r_m_vendors'],
            'nohp' => ['required', 'string', 'max:16'],
            'alamat' => ['required', 'string'],
        ]);

        CRMVendor::create($validator);

        return redirect('/admin/vendor')->with('success', 'Data Vendor telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CRMVendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(CRMVendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CRMVendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(CRMVendor $vendor)
    {
        return view('dashboard.admin.vendor.vendorEdit', [
            'title' => 'Vendor',
            'vendor' => $vendor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CRMVendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CRMVendor $vendor)
    {
        $validator = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'nohp' => ['required', 'string', 'max:16'],
            'alamat' => ['required', 'string'],
        ]);

        CRMVendor::where('id', $vendor->id)->update($validator);

        return redirect('/admin/vendor')->with('success', 'Data Vendor berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CRMVendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(CRMVendor $vendor, $id)
    {
        // CRMVendor::destroy($vendor->id);
        // return redirect('/admin/vendor')->with('success', 'Data Vendor telah dihapus');

        $data = CRMVendor::find($id);
        $data->delete();
        return redirect('/admin/vendor')->with('success', 'Data Vendor telah dihapus');
    }

    public function search(Request $request)
    {
        $output = "";
        $vendors = CRMVendor::where('nama', 'like', '%' . $request->search . '%')
            ->orWhere('alamat', 'like', '%' . $request->search . '%')
            ->orWhere('nohp', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->get();

        foreach ($vendors as $vendor) {
            $output .=

                '<tr>
    
                        <td> ' . $vendor->nama . ' </td>
                        <td> ' . $vendor->alamat . ' </td>
                        <td> ' . $vendor->nohp . ' </td>
                        <td> ' . $vendor->email . ' </td>
    
                        <td class="text-center"> ' . ' 
                        <a href="/admin/vendor/' . $vendor->id  . '/edit" class="btn btn-success">Edit</a>
                        <a href="/admin/vendor/' . $vendor->id  . '/delete" class="btn btn-danger">Delete</a>
                        ' . ' </td>
                        
                    </tr>';
        }
        return response($output);
    }
}
