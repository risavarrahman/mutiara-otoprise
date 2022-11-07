<?php

namespace App\Http\Controllers;

use App\Models\CRMCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRMCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.customer.customer', [
            'title' => 'Customer',
            'customer' => CRMCustomer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.customer.customerCreate', [
            'title' => 'Customer'
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:c_r_m_customers'],
            'nohp' => ['required', 'string', 'max:16'],
            'alamat' => ['required', 'string'],
        ]);

        CRMCustomer::create($validator);

        return redirect('/admin/customer')->with('success', 'Data Customer telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CRMCustomer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(CRMCustomer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CRMCustomer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(CRMCustomer $customer)
    {
        return view('dashboard.admin.customer.customerEdit', [
            'title' => 'Customer',
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CRMCustomer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CRMCustomer $customer)
    {
        $validator = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'nohp' => ['required', 'string', 'max:16'],
            'alamat' => ['required', 'string'],
        ]);

        CRMCustomer::where('id', $customer->id)->update($validator);

        return redirect('/admin/customer')->with('success', 'Data Customer berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CRMCustomer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(CRMCustomer $customer, $id)
    {
        // CRMCustomer::destroy($customer->id);
        // return redirect('/admin/customer')->with('success', 'Data Customer telah dihapus');

        $data = CRMCustomer::find($id);
        $data->delete();
        return redirect('/admin/customer')->with('success', 'Data Customer telah dihapus');
    }

    public function search(Request $request)
    {
        $output = "";
        $customers = CRMCustomer::where('nama', 'like', '%' . $request->search . '%')
            ->orWhere('alamat', 'like', '%' . $request->search . '%')
            ->orWhere('nohp', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->get();


        foreach ($customers as $customer) {
            $output .=

                '<tr>

                    <td> ' . $customer->nama . ' </td>
                    <td> ' . $customer->alamat . ' </td>
                    <td> ' . $customer->nohp . ' </td>
                    <td> ' . $customer->email . ' </td>

                    <td class="text-center"> ' . ' 
                    <a href="/admin/customer/' . $customer->id  . '/edit" class="btn btn-success">Edit</a>
                    <a href="/admin/customer/' . $customer->id  . '/delete" class="btn btn-danger">Delete</a>
                    ' . ' </td>
                    
                </tr>';
        }
        return response($output);
    }
}
