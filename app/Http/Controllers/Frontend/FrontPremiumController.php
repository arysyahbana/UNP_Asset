<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontPremiumController extends Controller
{
    public function show_premium(Request $request, $id)
    {
        $edit = User::where('id', $id)->first();
        // if ($request->subscribe == '') {
        //     return 'tolol';
        // }
        return view('frontend.subscribe.front_gopremium', compact('edit'));
    }

    public function premium(Request $request, $id)
    {
        $update = User::where('id', $id)->first();
        $update->role = 'pending';
        $update->update();
        compact('update');
        return redirect()->route('home')->with('success', 'Akun anda akan segera premium');
    }

    public function noHp()
    {
        $no = Auth::user()->hp;

        return response()->json($no);
    }
}
