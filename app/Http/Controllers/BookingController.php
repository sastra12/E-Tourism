<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Booking::where('status', 'ACC')->get();
        // foreach ($items as $item) {
        //     echo $item->nama_pemesan . PHP_EOL;
        // }
        return view('booking.index', compact('items'));
    }

    public function reservation()
    {
        $items = Booking::where('status', 'PENDING')->get();
        return view('booking.reservation', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.create');
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
            'nama_pemesan' => 'required',
            'jenis_kelamin' => 'required',
            'nik' => 'required|numeric|min:16',
            'type_tour' => 'required',
            'tanggal' => 'required',
            'durasi_menginap' => 'required',
            'makanan' => 'required',
        ]);

        if ($validated->fails()) {
            return redirect()->route('personreservation.index')->withErrors($validated)->withInput();
        } else {

            $harga_type_tour = null;
            if ($request->type_tour == 'Ekonomi') {
                $harga_type_tour = 1000000;
            } elseif ($request->type_tour == 'Bisnis') {
                $harga_type_tour = 1500000;
            } elseif ($request->type_tour == 'Eksekutif') {
                $harga_type_tour = 2000000;
            }

            $tambahmakanan = ($request->makanan) == 1 ? 80000 * $request->durasi_menginap : 0;

            $harga_final = null;
            if ($request->durasi_menginap > 3) {
                $harga_total_tanpa_diskon = ($harga_type_tour * $request->durasi_menginap) + $tambahmakanan;
                $diskon = 0.1 * $harga_total_tanpa_diskon;
                $harga_final = $harga_total_tanpa_diskon - $diskon;
            } elseif ($request->durasi_menginap <= 3) {
                $harga_final = $harga_type_tour * $request->durasi_menginap + $tambahmakanan;
            }

            $booking = new Booking();
            $booking->nama_pemesan = $request->nama_pemesan;
            $booking->jenis_kelamin = $request->jenis_kelamin;
            $booking->nik = $request->nik;
            $booking->type_tour = $request->type_tour;
            $booking->tanggal_perjalanan = $request->tanggal;
            $booking->durasi_menginap = $request->durasi_menginap;
            $booking->makanan = $request->makanan;
            $booking->total_tagihan = $harga_final;
            $booking->status = 'ACC';
            $booking->save();
            return redirect()->route('bookings.index')->with('success', 'Data Berhasil Di Tambahkan');
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
        $item = Booking::findOrFail($id);
        // ddd($item);
        return view('booking.updatereservation', compact('item'));
    }

    public function adminbookingupdate($id)
    {
        $item = Booking::findOrFail($id);
        // ddd($item);
        return view('booking.adminbookingupdate', compact('item'));
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
        $harga_type_tour = null;
        if ($request->type_tour == 'Ekonomi') {
            $harga_type_tour = 1000000;
        } elseif ($request->type_tour == 'Bisnis') {
            $harga_type_tour = 1500000;
        } elseif ($request->type_tour == 'Eksekutif') {
            $harga_type_tour = 2000000;
        }

        $tambahmakanan = ($request->makanan) == 1 ? 80000 : 0;

        $harga_final = null;
        if ($request->durasi_menginap > 3) {
            $harga_total_tanpa_diskon = ($harga_type_tour * $request->durasi_menginap) + $tambahmakanan;
            $diskon = 0.1 * $harga_total_tanpa_diskon;
            $harga_final = $harga_total_tanpa_diskon - $diskon;
        } elseif ($request->durasi_menginap <= 3) {
            $harga_final = $harga_type_tour * $request->durasi_menginap + $tambahmakanan;
        }
        $booking = Booking::findOrFail($id);
        $booking->nama_pemesan = $request->nama_pemesan;
        $booking->jenis_kelamin = $request->jenis_kelamin;
        $booking->nik = $request->nik;
        $booking->type_tour = $request->type_tour;
        $booking->tanggal_perjalanan = $request->tanggal;
        $booking->durasi_menginap = $request->durasi_menginap;
        $booking->makanan = $request->makanan;
        $booking->total_tagihan = $harga_final;
        $booking->status = $request->status;
        $booking->save();
        return redirect()->route('bookings.index')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Booking::findOrFail($id);
        $item->delete();
        return redirect()->route('bookings.index')->with('success', 'Data Berhasil Di Hapus');
    }
}
