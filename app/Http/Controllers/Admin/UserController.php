<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Hash;
use Helper;
use Illuminate\Http\Request;
use Redirect;
use User;
use View;

class UserController extends Controller
{
    //region Users
    public function list(Request $request)
    {
        $users = User::whereNotNull('id');

        $q = $request->input('q');
        if (!empty($q)) {
            $users = $users->where('name', 'LIKE', '%' . $q . '%')->orWhere('user', 'LIKE', '%' . $q . '%');
        }

        $order_col = $request->input('order_col');
        $order = $request->input('order');
        $users = Helper::orderColumn($users, $order_col, $order, 'id', 'ASC');

        $users = $users->paginate(self::NUM_PAGED_RESULTS);

        return view('admin.users.list', compact('users', 'q', 'order_col', 'order'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function do_create(Request $request)
    {
        $pwd = $request->input('pwd');
        $pwd2 = $request->input('pwd2');

        if ($pwd !== $pwd2)
            return redirect()->back()->withInput($request->all())->with('error', 'Las contraseñas introducidas no coinciden!');

        $this->validateData($request);

        $user = new User;
        $user->user = $request->input('user');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($pwd);
        $user->role = intval($request->input('role'));

        $picture = $request->file('picture');
        if ($picture) {
            $filename = Helper::generateFilename($picture->getClientOriginalName());
            $picture->storeAs('/public/users', $filename);
            $user->picture = $filename;
        }

        $user->save();

        return redirect()->route('admin.user.list')->with('success', 'El user ha sido creado correctamente');
    }

    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function do_edit(Request $request)
    {
        $user = User::find($request->input('id'));
        $this->validateData($request, $user->id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = intval($request->input('role'));
        $pwd = $request->input('pwd');
        $pwd2 = $request->input('pwd2');
        if (!empty($pwd) && !empty($pwd2)) {  //si no introduce contraseña es que no la quiere cambiar
            if ($pwd === $pwd2)// Si introduce contraseña nueva y Si coinciden las contraseñas
                $user->password = Hash::make($pwd);
            else
                return redirect()->back()->with('error', 'Las contraseñas introducidas no coinciden!');
        }
        $picture = $request->file('picture');
        if ($picture) {
            $filename = Helper::generateFilename($picture->getClientOriginalName());
            $picture->storeAs('/public/users', $filename);
            $user->picture = $filename;
        }

        $user->save();
        return redirect()->route('admin.user.list')->with('success', 'El usuario ha sido editado con éxito');
    }

    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->active = 1;
        $user->save();
        return redirect()->back()->with('success', 'El usuario ha sido activado con éxito!');
    }

    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->active = 0;
        $user->save();
        return redirect()->back()->with('success', 'El usuario ha sido desactivado con éxito!');
    }
    //endregion Users

    private function validateData(Request $request,int $id = 0) : void{
        $request->validate(User::rules($id),User::$rulesMessages);
    }
}
