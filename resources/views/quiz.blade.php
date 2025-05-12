@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <h1 class="text-4xl md:text-6xl font-bold text-center mb-8 villain-title text-red-600">
        Which Historical Villain Are You?
    </h1>

    <form action="{{ route('result') }}" method="POST" class="space-y-8">
        @csrf

        <div class="question-card p-6 rounded-lg space-y-4">
            <h2 class="text-xl font-bold text-red-500">Question 1: Power vs Influence</h2>
            <p class="text-lg">Would you rather be a tyrant feared by millions or a puppeteer hidden in shadows?</p>
            <div class="grid grid-cols-2 gap-4">
                <button type="button" class="option-btn p-4 bg-gray-800 rounded-lg hover:bg-red-900" onclick="selectOption(this, 'q1', 'A')">
                    A) Tyrant feared by millions
                </button>
                <button type="button" class="option-btn p-4 bg-gray-800 rounded-lg hover:bg-red-900" onclick="selectOption(this, 'q1', 'B')">
                    B) Puppeteer in shadows
                </button>
            </div>
            <input type="hidden" name="q1" id="q1" required>
        </div>

        <div class="question-card p-6 rounded-lg space-y-4">
            <h2 class="text-xl font-bold text-red-500">Question 2: Strategy vs Instinct</h2>
            <p class="text-lg">When facing your enemies, do you prefer calculated moves or raw, overwhelming force?</p>
            <div class="grid grid-cols-2 gap-4">
                <button type="button" class="option-btn p-4 bg-gray-800 rounded-lg hover:bg-red-900" onclick="selectOption(this, 'q2', 'A')">
                    A) Raw, overwhelming force
                </button>
                <button type="button" class="option-btn p-4 bg-gray-800 rounded-lg hover:bg-red-900" onclick="selectOption(this, 'q2', 'B')">
                    B) Calculated moves
                </button>
            </div>
            <input type="hidden" name="q2" id="q2" required>
        </div>

        <div class="question-card p-6 rounded-lg space-y-4">
            <h2 class="text-xl font-bold text-red-500">Question 3: Secret Cult vs Open Conquest</h2>
            <p class="text-lg">Would you rather lead a secret society of devoted followers or command vast armies in open warfare?</p>
            <div class="grid grid-cols-2 gap-4">
                <button type="button" class="option-btn p-4 bg-gray-800 rounded-lg hover:bg-red-900" onclick="selectOption(this, 'q3', 'A')">
                    A) Secret society
                </button>
                <button type="button" class="option-btn p-4 bg-gray-800 rounded-lg hover:bg-red-900" onclick="selectOption(this, 'q3', 'B')">
                    B) Open warfare
                </button>
            </div>
            <input type="hidden" name="q3" id="q3" required>
        </div>

        <div class="question-card p-6 rounded-lg space-y-4">
            <h2 class="text-xl font-bold text-red-500">Question 4: Logic vs Emotion</h2>
            <p class="text-lg">When making decisions, do you follow cold logic or let your passions guide you?</p>
            <div class="grid grid-cols-2 gap-4">
                <button type="button" class="option-btn p-4 bg-gray-800 rounded-lg hover:bg-red-900" onclick="selectOption(this, 'q4', 'A')">
                    A) Let passions guide
                </button>
                <button type="button" class="option-btn p-4 bg-gray-800 rounded-lg hover:bg-red-900" onclick="selectOption(this, 'q4', 'B')">
                    B) Follow cold logic
                </button>
            </div>
            <input type="hidden" name="q4" id="q4" required>
        </div>

        <div class="question-card p-6 rounded-lg space-y-4">
            <h2 class="text-xl font-bold text-red-500">Question 5: Reputation</h2>
            <p class="text-lg">How would you prefer to be remembered in history?</p>
            <div class="grid grid-cols-2 gap-4">
                <button type="button" class="option-btn p-4 bg-gray-800 rounded-lg hover:bg-red-900" onclick="selectOption(this, 'q5', 'A')">
                    A) Feared by all
                </button>
                <button type="button" class="option-btn p-4 bg-gray-800 rounded-lg hover:bg-red-900" onclick="selectOption(this, 'q5', 'B')">
                    B) Respected by many
                </button>
            </div>
            <input type="hidden" name="q5" id="q5" required>
        </div>

        <div class="text-center">
            <button type="submit" class="px-8 py-4 bg-red-600 hover:bg-red-700 rounded-lg text-xl font-bold transition-all transform hover:scale-105">
                Reveal Your True Nature
            </button>
        </div>
    </form>
</div>

<script>
function selectOption(button, questionId, value) {
    // Remove selected class from all buttons in this question
    const questionCard = button.closest('.question-card');
    questionCard.querySelectorAll('.option-btn').forEach(btn => {
        btn.classList.remove('bg-red-900');
        btn.classList.add('bg-gray-800');
    });

    // Add selected class to clicked button
    button.classList.remove('bg-gray-800');
    button.classList.add('bg-red-900');

    // Update hidden input
    document.getElementById(questionId).value = value;
}
</script>
@endsection
