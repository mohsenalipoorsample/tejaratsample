<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Pharmacy;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class PharmacyController extends Controller
{
    public function index(Request $request)
    {
        $products = Products::all();
        $brands = Brand::all();
        if ($request->ajax()) {
            $data = DB::table('pharmacies')
                ->where('user_id', auth()->user()->id)
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($row) {
                    return verta($row->created_at);
                })
                ->addColumn('number', function ($row) {
                    $suppliers = DB::table('suppliers')
                        ->where('pharmacies_id', $row->id)
                        ->count();

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="ویرایش"
                       class="see_suppliers">
                      ' . $suppliers . '
                      </a>&nbsp;&nbsp;';

                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action', 'number'])
                ->make(true);
        }
        return view('Pharmacy.list', compact('products', 'brands'));
    }

    public function list_suppliers(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('suppliers')
                ->where('pharmacies_id', $request->order_id)
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
        $check = DB::table('pharmacies')->count();
        $code = 1000 + $check;

        DB::beginTransaction();
        try {

            $id = DB::table('pharmacies')->insertGetId([
                'user_id' => auth()->user()->id,
                'code' => $code,
                'created_at' => $created_at,
            ]);
            try {
                $product = count(collect($request)->get('product'));
                for ($i = 0; $i <= $product; $i++) {
                    DB::table('pharmacy_order_details')->insert([
                        'pharmacies_id' => $id,
                        'product_id' => $request->get('product')[$i],
                        'brand_id' => $request->get('brand')[$i],
                        'number' => $request->get('number')[$i],
                        'created_at' => $created_at,
                    ]);
                }
            } catch (\Exception $exception) {

            }

            DB::commit();
        } catch (\Exception $exception) {

            DB::rollBack();
        }
        return response()->json(['success' => 'success']);


    }

    public function actions($row)
    {

        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="ویرایش"
                       class="editProduct">
                       <i class="fa fa-edit fa-lg" title="ویرایش"></i>
                      </a>&nbsp;&nbsp;';

        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="حذف"
                       class="status">
                        <i class="fa fa-trash fa-lg" title="حذف"></i>
                       </a>';

        return $btn;
    }
}
