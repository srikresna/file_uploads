<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload(){
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request){
        // dump($request->berkas);
        // return "Pemrosesan file upload di sini";
        $request->validate([
            'berkas' => 'required|file|image|max:500'
        ]);
        $extfile = $request->berkas->getClientOriginalName();
        $nameFile = 'web-' .time(). "." .$extfile;

        $path = $request->berkas->move('gambar',$nameFile);
        $path = str_replace('\\', '//', $path);
        echo "Variable path berisi:$path <br>";

        $pathBaru = asset('gambar/'.$nameFile);
        echo "proses upload berhasil, data disimpan pada:$path";
        echo "<br>";
        echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";
    }
}
