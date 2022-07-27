<?php

namespace App\Http\Controllers;
use App\Models\Signature;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class SignatureController extends Controller
{
    public function index()
    {
        $date = now()->format('Y-m-d');
        $signature = Signature::where('tanggal', '=', $date)->count();

        return view('kepsek.signature-pad', compact('signature'));
    }

    public function save(Request $request)
    {
        $folderPath = 'images/signature/';

        $image = explode(";base64,", $request->signed);

        $image_type_aux = explode("image/", $image[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image[1]);

        $signature = uniqid() . '.'.$image_type;

        $file = $folderPath . $signature;

        file_put_contents($file, $image_base64);

        $date = Carbon::now();
        $user = User::where('id', Auth::user()->id)->first();
        $jurnal = Signature::where('user_id', $user->id)->first();

        $save = new Signature;
        $save->user_id = $user->id;
        $save->tanggal = $date;
        $save->tanda_tangan = $signature;
        $save->save();

        return back()->with('success', 'Signature saved successfully !!');
    }
}
