<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;
use PhpParser\Node\Stmt\ElseIf_;

class WordController extends Controller
{
    public function checkWord(Request $request)
    {
        $word = $request->input('word');

        // تحقق من أن الكلمة ليست فارغة
        // if (!$word) {
        //     return response()->json(['error' => 'No word found'], 400);
        // }

        $wordExists = Word::where('word', $word)->exists();

        if ($wordExists) {
            return response()->json(['message' => 'yes i find the word']);
        } else {

            if (strlen($word) > 5) {
                if (!preg_match('/\d/', $word) && !preg_match('/\s/' , $word)) {
                    // Word is longer than 5 characters and contains no digits

                    // Save the word
                    $newWord = new Word();
                    $newWord->word = $word;
                    $newWord->save();

                    return response()->json(['message' => 'Word not found, but it\'s saved now!']);
                } else {
                    return response()->json(['message' => 'Word didn\'t match our qualification: contains numbers. or white spaces 
                    ']);
                }
            
            } else {
                return response()->json(['message' => 'Word didn\'t match our qualification: too short.']);
            }
        }
    }
}
