<?php

namespace App\Http\Controllers\Suppliers;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SuppliersController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('pharmacies')
                ->whereNull('status')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user', function ($row) {
                    $user = DB::table('users')
                        ->where('id', $row->user_id)
                        ->first();
                    return $user->name;
                })
                ->addColumn('date', function ($row) {
                    return verta($row->created_at);

                })
                ->addColumn('statuss', function ($row) {
                    if ($row->status == 1) {
                        return "غیر فعال";
                    } else {
                        return "فعال";
                    }

                })
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Suppliers.list');
    }

    public function list_order(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('pharmacy_order_details')
                ->where('pharmacies_id', $request->order_id)
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('product', function ($row) {
                    $product = DB::table('products')
                        ->where('id', $row->product_id)
                        ->first();
                    return $product->name;
                })
                ->addColumn('brand', function ($row) {
                    $brand = DB::table('brands')
                        ->where('id', $row->brand_id)
                        ->first();
                    return $brand->name;
                })
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Suppliers.list');
    }

    public function store(Request $request)
    {
        $created_at = Carbon::now();
        DB::table('suppliers')
            ->insert([
                'pharmacies_id' => $request->order_id,
                'user_id' => auth()->user()->id,
                'price' => $request->price,
                'description' => $request->description,
                'created_at' => $created_at,
            ]);

        return response()->json(['success' => 'success']);
    }

    public function actions($row)
    {

        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="جزییات سفارش"
                       class="detail_order">
                       <i class="fa fa-eye fa-lg" title="جزییات سفارش"></i>
                      </a>&nbsp;&nbsp;';


        return $btn;
    }
}
