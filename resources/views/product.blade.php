<x-layout>
    <x-slot:heading>Product</x-slot:heading>
    <h2 class="font-bold text-lg">{{ $product['name'] }}</h2>
    <p>{{ $product['description'] }}</p>
    <p class="mt-2 text-sm text-gray-600">Laatst gebruikt: {{ $product['last_used'] ?? 'Nooit' }}</p>
    @php
    $kleur = match($product['status']) {
    'beschikbaar' => 'bg-green-100 text-green-800',
    'onbeschikbaar' => 'bg-orange-100 text-orange-800',
    'kapot' => 'bg-red-100 text-red-800',
    default => 'bg-gray-100 text-gray-800',
    };
    @endphp
    <p class="px-2 py-1 rounded-full text-sm font-medium {{ $kleur }}">Status: {{ ucfirst($product['status']) }}</p>
    <a href="/producten" class="mt-4 inline-block text-blue-600 hover:underline">Terug naar Producten</a>
</x-layout>