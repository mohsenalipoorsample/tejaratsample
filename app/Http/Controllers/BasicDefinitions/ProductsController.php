<?php

namespace App\Http\Controllers\BasicDefinitions;

use App\Http\Controllers\Controller;
use App\Models\c;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('products')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($row) {
                    return verta($row->created_at);
                })
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Product.list');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required',
        ], [
            'title.required' => 'پر کردن فیلد نام محصول الزامی میباشد.',
            'price.required' => 'پر کردن فیلد قیمت محصول الزامی میباشد.',

        ]);

        $created_at = Carbon::now();

        if ($validator->passes()) {
            Products::create([
                'price' => $request->price,
                'name' => $request->title,
                'user_id' => auth()->user()->id,
                'created_at' => $created_at,
            ]);
            return response()->json(['success' => 'success']);

        }

        return Response::json(['errors' => $validator->errors()]);


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
