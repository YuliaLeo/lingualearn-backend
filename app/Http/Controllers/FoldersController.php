<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoldersController extends Controller
{
    public function index()
    {
        $folders = Folder::all();

        return response()->json(['folders' => $folders], 200);
    }

    public function store(Request $request)
    {
        Folder::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return response()->json(['message' => 'Folder created successfully'], 201);
    }

    public function edit(string $id)
    {
        $folder = Folder::find($id);

        return response()->json(['folder' => $folder], 200);
    }

    public function update(Request $request, string $id)
    {
        $folder = Folder::find($id);
        $folder->update($request->all());
        return response()->json(['folder' => $folder], 200);
    }

    public function destroy(string $id)
    {
        $folder = Folder::find($id);
        $folder->delete();
    }
}
