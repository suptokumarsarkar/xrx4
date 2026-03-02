<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SessionDataController extends Controller
{
    public function switch($id){
        Session::put('theme', $id);
    }

    public function saveSession(Request $request, $id, $value){
        if($value == 'xxx') $value = $request->get($id);
        Session::put($id, $value);
    }
    public function fileUploaderFree(Request $request){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . str_replace(" ", "_",$file->getClientOriginalName());

            // Store the file in the uploads folder
            $path = $file->storeAs('uploads', $filename, 'public');

            if ($path) {
                $url = Storage::url($path);
                $mimeType = $file->getMimeType();

                return response()->json([
                    'success' => true,
                    'url' => $url,
                    'mimeType' => $mimeType
                ]);
            }
        }

        return response()->json([
            'success' => false,
            'error' => 'File upload failed'
        ], 400);
    }
}
