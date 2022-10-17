<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Imports\CertificateImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $name = '')
    {
        if (isset($request->search)) {
            $name = $request->search;
        }

        $certificates = Certificate::where('name', 'LIKE', '%' . $name . '%')->orderBy('created_at', 'desc')->paginate(7)->withQueryString();
        return view('dashboard.index', [
            'certificates' => $certificates,
            'title' => 'Index'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/create', [
            'title' => 'Create'
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
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $validated['print_count'] = 0;
        $validated['file_name'] = '';

        Certificate::create($validated);

        return redirect('/certificate')->with('success', 'Data has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard/show', [
            'title' => 'Show',
            'certificate' => Certificate::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('dashboard/edit', [
            'title' => 'Edit',
            'certificate' => $certificate
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|string'
        ]);

        // dd($validate['name']);
        Certificate::find($id)->update($validate);

        return redirect('/certificate')->with('success', 'Edit berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Certificate::destroy($id);

        return redirect('/certificate')->with('success', 'Data has been deleted!');
    }

    public function dashboard()
    {
        $certificate = new Certificate;
        $most_printed = $certificate->where('print_count', $certificate->max('print_count'))->first();

        return view('dashboard.dashboard', [
            'certificates' => $certificate->latest()->take(7)->get(),
            'most_printed' => $most_printed,
            'title' => 'Dashboard'
        ]);
    }

    public function import(Request $request)
    {
        if ($request->file('file')->getClientMimeType() != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
            return redirect('/certificate/create')->with('danger', 'Incorrect Format File!');
        }

        Excel::import(new CertificateImport, $request->file('file'));

        return redirect('/certificate')->with('success', 'Import Success!');
    }
}
