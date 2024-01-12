<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateWordRequest;
use App\Http\Requests\RepeatWordsRequest;
use App\Models\Folder;
use App\Models\UsersWord;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
    public function index()
    {
        $words = UsersWord::all();

        return response()->json(['words' => $words], 200);
    }

    public function store(CreateOrUpdateWordRequest $request)
    {
        UsersWord::create([
            'word' => $request->word,
            'translation' => $request->translation,
            'folder_id' => $request->folder_id,
        ]);

        return response()->json(['message' => 'Word created successfully'], 201);
    }

    public function edit(string $id)
    {
        $word = UsersWord::find($id);

        return response()->json(['word' => $word], 200);
    }

    public function update(CreateOrUpdateWordRequest $request, string $id)
    {
        $word = UsersWord::find($id);
        $word->update($request->all());
        return response()->json(['word' => $word], 200);
    }

    public function destroy(string $id)
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

        return response()->json(['words' => $collection], 200);
    }
}
