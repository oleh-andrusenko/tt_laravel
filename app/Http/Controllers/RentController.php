<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    //

    public function index()
    {
        $rents = Rent::with(['user', 'car'])->get();
        return view('rents.index', compact('rents'));
    }
    public function price()
    {
        $data = request()->validate([
            'endDate' => '',
            'startDate' => '',
            'carPrice' => ''
        ]);

        $diff = date_diff(date_create($data['endDate']), date_create($data['startDate']))->days + 1;
        $price = $diff * $data['carPrice'];

        switch ($diff) {
            case $diff >= 5 && $diff < 10:
                $discount = $price * 0.05;
                break;
            case $diff >= 10 && $diff < 21:
                $discount = $price * 0.1;
                break;
            case $diff >= 21:
                $discount = $price * 0.25;
                break;
            default:
                $discount = 0;
                break;
        }

        echo json_encode(['price' => round($price - $discount), 'days' => $diff]);
    }

    public function edit(Rent $rent)
    {

        return view('rents.edit', compact('rent'));
    }

    public function update(Request $request, Rent $rent)
    {
        $data = request()->validate([
            'paymentStatus' => 'required',
            'rentStatus' => 'required',
        ]);
        $rent->update($data);
        return redirect()->route('rents.index');
    }

}
