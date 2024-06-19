<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GantiPasswordController extends Controller
{
    public function index() {
        return view('layers.login.gantiPassword');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'lama' => 'required|string',
            'baru' => 'required|string|min:6|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/',
            'konfirmasi' => 'required|string|min:6|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/'
        ]);
        
        $lama = $request->lama;
        $baru = $request->baru;
        $konfirmasi = $request->konfirmasi;
        $user = Auth::user();
        $user = User::find($user->id);
        
        if (password_verify($lama, $user->password)) {
            if ($baru == $konfirmasi) {
                $user->password = Hash::make($baru);
                $user->save();

                Auth::logout();
     
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')->with('success', 'Password berhasil diperbarui.');
            } else {
                return back()->with('changePasswordError', 'Password gagal diperbarui! konfirmasi password tidak sama dengan password baru');
            }
        } 

        return back()->with('changePasswordError', 'Password gagal diperbarui! Anda memasukkan password yang salah!');
    }
}
