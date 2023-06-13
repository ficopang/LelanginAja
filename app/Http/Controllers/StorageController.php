<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    public function show($folder, $filename)
    {
        $filePath = storage_path("app/public/{$folder}/{$filename}");

        if (file_exists($filePath)) {
            return response()->file($filePath);
        }

        abort(404, 'File not found');
    }
}
