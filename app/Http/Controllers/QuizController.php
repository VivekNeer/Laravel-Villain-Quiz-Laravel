<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function showQuiz()
    {
        return view('quiz');
    }

    public function showResult(Request $request)
    {
        $request->validate([
            'q1' => 'required|in:A,B',
            'q2' => 'required|in:A,B',
            'q3' => 'required|in:A,B',
            'q4' => 'required|in:A,B',
            'q5' => 'required|in:A,B',
        ]);

        $answers = [
            $request->q1,
            $request->q2,
            $request->q3,
            $request->q4,
            $request->q5
        ];

        $aCount = count(array_filter($answers, fn($answer) => $answer === 'A'));
        $bCount = count(array_filter($answers, fn($answer) => $answer === 'B'));

        $villains = [
            'vlad' => [
                'name' => 'Vlad the Impaler',
                'title' => 'THE SCOURGE OF EUROPE',
                'description' => 'Cruelty isn\'t a flaw. It\'s a tool. You don\'t just win — you erase your enemies from memory. You are ruthless, cold, and terrifyingly efficient. You are the monster that bedtime stories warn about.',
                'image' => 'vlad.jpg'
            ],
            'rasputin' => [
                'name' => 'Rasputin',
                'title' => 'THE MAD MONK',
                'description' => 'You speak in riddles, but your eyes know everything. People trust you too easily — and that\'s their biggest mistake. You\'re not evil... you\'re inevitable.',
                'image' => 'rasputin.jpg'
            ],
            'genghis' => [
                'name' => 'Genghis Khan',
                'title' => 'THE GREAT KHAN',
                'description' => 'You conquer not just with armies, but with vision. Where others see maps, you see opportunity. You bring order through devastation, and you write history in the blood of dynasties.',
                'image' => 'genghis.jpg'
            ],
            'lucrezia' => [
                'name' => 'Lucrezia Borgia',
                'title' => 'THE POISONOUS PRINCESS',
                'description' => 'You don\'t need swords — just a glance and a whispered word. You bend the powerful to your will with elegance, and your enemies never see it coming.',
                'image' => 'lucrezia.jpg'
            ],
            'attila' => [
                'name' => 'Attila the Hun',
                'title' => 'THE SCOURGE OF GOD',
                'description' => 'Chaos rides beside you. Kingdoms flee at your name. You\'re not a tactician — you are raw force, the end of civility, and the start of something primal.',
                'image' => 'attila.jpg'
            ]
        ];

        $result = match(true) {
            $aCount >= 4 => $villains['vlad'],
            $bCount >= 4 => $villains['genghis'],
            $aCount === 3 && $bCount === 2 => $villains['lucrezia'],
            $aCount === 2 && $bCount === 3 => $villains['attila'],
            default => $villains['rasputin']
        };

        return view('result', ['result' => $result]);
    }
}
