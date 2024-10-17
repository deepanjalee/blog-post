<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class UserController extends Controller
{

    private $name = "";
    private $viewName = "";
    private $routeName = "";
    private $mainTable = "";
    private $data = [];

    public function __construct(User $user)
    {

        $this->name = "User";
        $this->viewName = "admin.user";
        $this->routeName = "admin.users";
        $this->data['user_types'] = UserType::asSelectArray();
        $this->mainTable = $user;
    }

    public function index(Request $request)
    {
        $users = User::latest();

        $search = $request->common_search;

        if ($search != null) {
            $users = $users->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('mobile', 'like', "%$search%");
            });
        }



        $this->data['objects'] = $users->paginate(env('PAGINATION'))->appends(request()->query());
        $this->data['page_name'] = $this->name . " Manage";
        $this->data['btn_name'] = $this->name . " Add";
        $this->data['btn_route_edit'] = $this->routeName . '.show';
        $this->data['btn_route_delete'] = $this->routeName . '.destroy';
        $this->data['btn_route'] = route($this->routeName . '.create');
        return view($this->viewName . '.index', $this->data);
    }

    public function create()
    {
        $this->data['update'] = false;
        $this->data['object'] = $this->mainTable;
        $this->data['route'] = route($this->routeName . '.store');
        $this->data['page_name'] = $this->name . " Add";
        return view($this->viewName . '.form', $this->data);
    }

    public function store(UserRequest $request)
    {
        $user = Auth::user();
        if ($user != null) {
            $user_id = $user->id;
            $created_by =  $user_id;
            $updated_by =  $user_id;

            $request['created_by'] =  $created_by;
            $request['updated_by'] =  $updated_by;
            $object = User::create($request->all());
        }
        if ($user == null) {
            Log::channel('user_log')->info("User store() ---- Created User Not Found.");
            return redirect(route($this->routeName . '.index'))->with('error', $this->name . ' Created User Not Found.');
        }

        return redirect(route($this->routeName . '.index'))->with('status', $this->name . 'Added Successfully.');
        // dd($request->all());
    }

    public function show(User $user)
    {
        $this->data['object'] = $user;
        $this->data['page_name'] = $this->name . " Update";
        $this->data['route'] = route($this->routeName . '.update', $user);
        $this->data['update'] = true;
        return view($this->viewName . '.form', $this->data);
    }

    public function edit(User $user)
    {
        //
    }

    public function update(UserRequest $request, User $user)
    {
        $auth_user = Auth::user();
        if ($auth_user != null) {
            $auth_user_id = $auth_user->id;
            $updated_by =  $auth_user_id;

            $request['updated_by'] =  $updated_by;
            $object = $user->update($request->all());
        }
        if ($user == null) {
            Log::channel('user_log')->info("User update() ---- Created User Not Found.");
            return redirect(route($this->routeName . '.index'))->with('error', $this->name . ' Updated User Not Found.');
        }

        return redirect(route($this->routeName . '.index'))->with('status', $this->name . 'Added Successfully.');
    }

    public function destroy(User $user)
    {
        try {
            $auth_user = Auth::user()->id;
            if ($user != null) {
                $user->deleted_by =  $auth_user;
                $user->save();
                $user->delete();
                return redirect(route($this->routeName . '.index'))->with('status',  $this->name .  ' Deleted Successfully')->with('delete');
            }
        } catch (\Exception $exception) {
            Log::channel('user_log')->info("user destroy() Exception -----------  " . $exception->getMessage() . ' - line - ' . $exception->getLine() . ' - file --- ' . $exception->getFile());
        }
    }
}
