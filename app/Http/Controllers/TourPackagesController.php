<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TourPackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TourPackage::all();
        // foreach ($items as $item) {
        //     echo $item . PHP_EOL;
        // }
        return view('tour-packages.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tour-packages.tourpackagecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nama_paket' => 'required',
            'destinasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:jpg,png,jpeg',
        ]);
        if ($validated->fails()) {
            return redirect('/tour-packages/create')->withErrors($validated)->withInput();
        } else {
            $data = new TourPackage();
            $data->package_name = $request->nama_paket;
            $data->destinations = $request->destinasi;
            $data->description = $request->deskripsi;
            if ($request->file('gambar')) {
                $path = $request->file('gambar')->move('images/', $request->file('gambar')->getClientOriginalName());
                $data->image = $request->file('gambar')->getClientOriginalName();
            };
            $data->save();
            return redirect()->route('tourpackages.index')->with('success', 'Data Berhasil Di Tambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TourPackage::findOrFail($id);
        // ddd($item->package_name);
        return view('tour-packages.tourpackageupdate', compact('item'));
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
        $validated = Validator::make($request->all(), [
            'nama_paket' => 'required',
            'destinasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:jpg,png,jpeg',
        ]);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            $data = TourPackage::findOrFail($id);
            $data->package_name = $request->nama_paket;
            $data->destinations = $request->destinasi;
            $data->description = $request->deskripsi;
            if ($request->file('gambar')) {
                // Menghapus image lama dari folder 
                $url = public_path('images/' . $data->image);
                if (File::exists($url)) {
                    // Hapus file dari folder "public/images"
                    File::delete($url);
                }
                $path = $request->file('gambar')->move('images/', $request->file('gambar')->getClientOriginalName());
                $data->image = $request->file('gambar')->getClientOriginalName();
            };
            $data->save();
            return redirect()->route('tourpackages.index')->with('success', 'Data Berhasil Di Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TourPackage::findOrFail($id);
        $item->delete();
        return redirect()->route('tourpackages.index')->with('success', 'Data Berhasil Di Hapus');
    }
}
