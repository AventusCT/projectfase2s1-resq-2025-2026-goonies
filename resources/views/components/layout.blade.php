<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">

    <div class="min-h-full">
        <nav class="bg-gray-800/50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img src="{{ asset('Assets/ResQlogo.png') }}" alt="Your Company" class="size-24" />
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>

                                @guest
                                <x-nav-link href="/inlog" :active="request()->is('inlog')">Inloggen</x-nav-link>
                                @endguest

                                @auth
                                <x-nav-link href="/producten" :active="request()->is('producten')">Producten</x-nav-link>

                                @if(Auth::user()->is_admin)
                                <x-nav-link href="/statistieken" :active="request()->is('statistieken')">Statistieken</x-nav-link>
                                @endif
                                @endauth
                            </div>

                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button type="button" class="relative rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                                    <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>

                            <!-- Profile dropdown -->
                            <el-dropdown class="relative ml-3">
                                <button class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
                                </button>
                            </el-dropdown>
                        </div>
                    </div>
                </div>
            </div>

            <el-disclosure id="mobile-menu" hidden class="block md:hidden">
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>

                    @guest
                    <x-nav-link href="/inlog" :active="request()->is('inlog')">Inloggen</x-nav-link>
                    @endguest

                    @auth
                    <x-nav-link href="/producten" :active="request()->is('producten')">Producten</x-nav-link>

                    @if(Auth::user()->is_admin)
                    <x-nav-link href="/statistieken" :active="request()->is('statistieken')">Statistieken</x-nav-link>
                    @endif
                    @endauth
                </div>

            </el-disclosure>
        </nav>

        <header class="relative bg-gray-800 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <h1 class="text-3xl font-bold tracking-tight text-white">
                        {{ $heading }}
                    </h1>

                    @auth
                    <div class="flex items-center space-x-4">
                        <span class="text-sm font-normal text-gray-300">{{ Auth::user()->name }}</span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-white bg-red-600 hover:bg-red-700 px-3 py-1 rounded">
                                Uitloggen
                            </button>
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>