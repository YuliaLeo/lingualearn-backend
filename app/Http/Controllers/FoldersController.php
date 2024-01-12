<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateFolderRequest;
use App\Http\Requests\UsersFoldersRequest;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class FoldersController extends BaseController
{
    public function get(string $id)
    {
        $folder = Folder::find($id);

        return $this->successResponse(['folder' => $folder->only(['name'])], null, 200);
    }

    public function getAll(UsersFoldersRequest $request)
    {
        $userId = Auth::id();
        $folders = Folder::where('user_id', $userId)
            ->where('language_id', $request->languageId)
            ->get();
        $filteredFolders = $folders->map(function ($folder) {
            return $folder->only(['name']);
        });

        return $this->successResponse(['folders' => $filteredFolders], null, 200);
    }

    public function create(CreateOrUpdateFolderRequest $request)
    {
        Folder::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
            'language_id' => $request->language_id
        ]);

        return $this->successResponse(null, 'Folder created successfully', 201);
    }

    public function update(CreateOrUpdateFolderRequest $request, string $id)
    {
        $folder = Folder::find($id);
        $folder->update($request->all());

        return $this->successResponse(['folder' =>  $folder->only(['name'])], null, 200);
    }

    public function delete(string $id)
    {
        $folder = Folder::find($id);
        $folder->delete();
    }
}
