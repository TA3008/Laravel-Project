<?php

namespace App\Http\Controllers;


use App\Enums\RoleEnum;
use App\Models\User;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
}

public function save(Request $request, $id)
{
    $request->validate([
        'role' => ['required', Rule::in(array_column(RoleEnum::cases(), 'value'))],
    ]);

    $user = User::findOrFail($id);
    $user->role = RoleEnum::from($request->role); 
    $user->save();

    return redirect()->route('users.index')->with('success', 'Cập nhật quyền thành công.');
}

public function delete($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'Xóa người dùng thành công.');
}
}
