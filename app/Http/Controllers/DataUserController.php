<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    //
    public function index()
    {
        $user = User::where('role', 'masyarakat')->get();
        return view('datauser.index', compact('user'));
    }

    public function destroy($id)
    {
        try {
            User::where('id', $id)->delete();

            return redirect()->back()->with('success', 'User berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
