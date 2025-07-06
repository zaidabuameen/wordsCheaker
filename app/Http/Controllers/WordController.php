<?php

namespace App\Http\Controllers;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function checkWord(Request $request)
    {
        $word = $request->input('word');

        // تحقق من أن الكلمة ليست فارغة
        if (!$word || trim($word) === '') {
            return response()->json(['error' => 'No word provided'], 400);
        }

        $wordExists = Word::where('word', $word)->exists();

        if ($wordExists) {
            return response()->json(['message' => 'yes i find the word']);
        } else {  

               // إذا الكلمة غير موجودة، يتم حفظها في قاعدة البيانات
            $newWord = new Word();
            $newWord->word = $word;
            $newWord->save();
            return response()->json(['message' => 'Word not found, but it\'s saved now!']);

        }
    }
}
