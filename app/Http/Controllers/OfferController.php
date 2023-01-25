<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Offer;
use DataTables;

class OfferController extends Controller
{
    public function index(Request $request) 
    {
        if ($request->ajax()) {
            $data = Offer::with(['user','product'])->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user', function ($data) {
                        return  $data->user ? $data->user->name :'' ;
                    })
                    ->addColumn('product', function ($data) {
                        return  $data->product ? $data->product->name :'' ;
                    })
                    ->make(true);
        }
        return view('offers.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product)
    {
        return view('offers.create', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required',
            'product' => 'required'
        ]);
        $user = Auth::user();
        $offer = Offer::create([
            'price' => $request->price,
            'user_id' => $user->id,
            'product_id' => $request->product,
        ]);
        return redirect()->route('home.index')
                        ->with('success','Offer submitted successfully.');
    }
}
