<x-layout>
    <x-slot:heading>Producten pagina</x-slot:heading>
    <div class="px-4 py-6 sm:px-0">
        <div class="h-96 rounded-lg border-4 border border-gray-200 flex flex-col items-center justify-start overflow-y-auto p-4">
            <h1 class="text-2xl mb-4">Producten</h1>

            <form method="GET" action="{{ route('producten.index') }}" class="mb-4 w-full max-w-md">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Sorteer op status:</label>
                <select name="status" id="status" onchange="this.form.submit()" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Alle producten</option>
                    <option value="beschikbaar" {{ request('status') == 'beschikbaar' ? 'selected' : '' }}>Beschikbaar</option>
                    <option value="onbeschikbaar" {{ request('status') == 'onbeschikbaar' ? 'selected' : '' }}>Onbeschikbaar</option>
                    <option value="kapot" {{ request('status') == 'kapot' ? 'selected' : '' }}>Kapot</option>
                </select>
            </form>

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