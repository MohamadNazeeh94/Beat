<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Auth;
use DataTables;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) 
    {
        if ($request->ajax()) {
            $user = Auth::user();
            $data = Product::when($user->type == 'seller',function($q) use ($user){
                return $q->where('user_id',$user->id);
            })->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image',function($row){
                        return "<img src='".$row->logo."' width='100px'>";
                    })
                    ->addColumn('action', function($row) use($user){
   
                           $btn = $user->type == 'seller' ? '<a href="'.route("offer.index").'" class="edit btn btn-primary btn-sm">View Offers</a>' : '<a href="'.route("offer.create",$row->id).'" class="edit btn btn-primary btn-sm">Submit Offer</a>';
                            return $btn;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        return view('home.index');
    }
}