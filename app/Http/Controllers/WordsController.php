<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateWordRequest;
use App\Http\Requests\GetFoldersWordsRequest;
use App\Http\Requests\RepeatWordsRequest;
use App\Models\Folder;
use App\Models\UsersWord;
use Illuminate\Support\Facades\Auth;

class WordsController extends Controller
{
    public function get(string $id)
    {
        $word = UsersWord::find($id);

        return $this->successResponse(['word' => $word->only(['word', 'translation'])], null, 200);
    }

    public function getAll(GetFoldersWordsRequest $request)
    {
        $words = UsersWord::where('folder_id', $request->folder_id)->get();
        $filteredWords = $words->map(function ($word) {
            return $word->only(['word']);
        });

        return $this->successResponse(['words' => $filteredWords], null, 200);
    }

    public function create(CreateOrUpdateWordRequest $request)
    {
        UsersWord::create([
            'word' => $request->word,
            'translation' => $request->translation,
            'folder_id' => $request->folder_id,
        ]);

        return $this->successResponse(null, 'Word created successfully', 201);
    }

    public function update(CreateOrUpdateWordRequest $request, string $id)
    {
        $word = UsersWord::find($id);
        $word->update($request->all());

        return $this->successResponse(['word' => $word->only(['word', 'translation'])], null, 200);
    }

    public function delete(string $id)
    {
        $word = UsersWord::find($id);
        $word->delete();
    }

    public function repeat(RepeatWordsRequest $request)
    {
        $userId = Auth::id();
        $folders = Folder::where('user_id', $userId)->get();
        $words = [];

        foreach ($folders as $folder) {
            $wordsInFolder = UsersWord::where('folder_id', $folder->id)->get();
            $words = array_merge($words, $wordsInFolder);
        }

        $collection = collect($words);

        $collection = $collection->sortBy('next_repetition_time');

        $collection = $collection->take($request->count);

        return $this->successResponse(['words' => $collection], null, 200);
    }
}
