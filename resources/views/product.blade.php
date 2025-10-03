<x-layout>
    <x-slot:heading>Product</x-slot:heading>
    <h2 class="font-bold text-lg">{{ $product['product'] }}</h2>
    <p>{{ $product['description'] }}</p>
</x-layout>