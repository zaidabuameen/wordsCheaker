<?php

namespace App\Http\Controllers;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
      public function checkWord(Request $request)
    {
        // استلام الكلمة المدخلة من المستخدم
        $word = $request->input('word');
       
        // التحقق من وجود الكلمة في قاعدة البيانات
        $wordExists = Word::where('word', $word)->exists();
       
        if ($wordExists) {
            return response()->json(['message' => 'yes i find the word']);
        }
        else {
            return response()->json(['message' => 'no i cant find the word']);
        }
    }



}
