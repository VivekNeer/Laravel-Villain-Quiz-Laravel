@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto text-center">
    <div class="animate-fade-in">
        <h1 class="text-5xl md:text-7xl font-bold mb-4 villain-title text-red-600">
            {{ $result['title'] }}
        </h1>

        <div class="relative w-64 h-64 mx-auto mb-8">
            <img src="{{ asset('images/' . $result['image']) }}"
                 alt="{{ $result['name'] }}"
                 class="w-full h-full object-cover rounded-lg shadow-2xl border-4 border-red-900"
                 onerror="this.src='https://via.placeholder.com/400x400?text=Historical+Villain'">
        </div>

        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-red-500">
            {{ $result['name'] }}
        </h2>

        <p class="text-xl md:text-2xl mb-8 leading-relaxed max-w-2xl mx-auto">
            {{ $result['description'] }}
        </p>

        <div class="space-y-4">
            <a href="{{ route('quiz') }}"
               class="inline-block px-8 py-4 bg-red-600 hover:bg-red-700 rounded-lg text-xl font-bold transition-all transform hover:scale-105">
                Try Again
            </a>

            <button onclick="shareResult()"
                    class="block mx-auto px-8 py-4 bg-gray-800 hover:bg-gray-700 rounded-lg text-xl font-bold transition-all transform hover:scale-105">
                Share Your Villain
            </button>
        </div>
    </div>
</div>

<style>
.animate-fade-in {
    animation: fadeIn 1.5s ease-in;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<script>
function shareResult() {
    // This is just a placeholder for the share functionality
    alert('Share functionality would be implemented here!');
}
</script>
@endsection
