<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('auth.tambahakun');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->level = 0;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/');

        // return redirect()->json('Data berhasil disimpan', 200);
        
    }
}
