<x-layout>
    <x-slot:heading>Producten pagina</x-slot:heading>
    <div class="px-4 py-6 sm:px-0">
        <div class="h-96 rounded-lg border-4 border border-gray-200 flex flex-col items-center justify-start overflow-y-auto p-4">
            <h1 class="text-2xl mb-4">Producten</h1>
            <div class="space-y-4 w-full max-w-md">
                <ul>
                    @foreach ($producten as $product)
                    @php
                    $kleur = match($product['status']) {
                    'beschikbaar' => 'bg-green-100 text-green-800',
                    'onbeschikbaar' => 'bg-orange-100 text-orange-800',
                    'kapot' => 'bg-red-100 text-red-800',
                    default => 'bg-gray-100 text-gray-800',
                    };
                    @endphp
                    <li>
                        <div class="bg-white shadow rounded-lg p-4 m-2 flex items-center justify-between">
                            <a href="/producten/{{ $product['productid'] }}" class="text-blue-600 hover:underline text-lg font-semibold">
                                {{ $product['name'] }}
                            </a>
                            <span class="px-2 py-1 rounded-full text-sm font-medium {{ $kleur }}">
                                {{ ucfirst($product['status']) }}
                            </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-layout>