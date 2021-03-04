<?php

namespace App\Http\Controllers\BasicDefinitions;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();
        if ($request->ajax()) {
            $data = DB::table('users')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('role', function ($row) {
                    $role = DB::table('model_has_roles')
                        ->where('model_id', $row->id)
                        ->first();
                    if (!empty($role)) {
                        $name = DB::table('roles')
                            ->where('id', $role->role_id)
                            ->first();
                        return $name->name;
                    } else {
                        return "بدون نقش";
                    }


                })
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Users.list', compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
        ], [
            'email.unique' => 'کاربری با این نام کاربری در سیستم موجود است.',
            'email.required' => 'پر کردن فیلد نام کاربری الزامی میباشد.',
            'name.required' => 'پر کردن فیلد کلمه عبور کاربری الزامی میباشد.',
        ]);

        $created_at = Carbon::now();
        if ($validator->passes()) {

            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['created_at'] = $created_at;

            $user = User::create($input);
            $user->assignRole($request->input('roles'));

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
