<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;

class PersonReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('booking.personreservation');
    }

    public function bookinglist()
    {
        $items = Booking::paginate(5);
        return view('booking.bookinglist', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            } elseif ($request->durasi_menginap < 3) {
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
            $booking->status = 'PENDING';
            $booking->save();
            return redirect()->route('bookinglistperson')->with('success', 'Pesanan Berhasil Di Tambahkan');
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
        $item = Booking::findOrFail($id);
        return view('booking.detailpersonreservation', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
