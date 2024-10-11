<x-app-layout>
    <div class="py-12 min-h-screen">
        <div class="bg-white shadow-xl sm:rounded-lg md:max-w-7xl md:mx-auto flex items-stretch h-[85vh]">
            <div
                class="bg-gray-200 flex flex-col justify-between items-center p-3 sm:p-4 rounded-s-xl w-[15%] md:w-[20%]">
                <div class="flex flex-col items-start justify-center w-full mb-10">
                    <div class="flex items-center justify-center w-full">
                        <img src="logo2.png" alt="Logo Nortada de Sabores" class="w-20 mb-4 drop-shadow">
                    </div>

                    <div class="flex flex-col w-full gap-2">
                        <a href="{{ route('dashboard', ['tab' => 'status']) }}" class="w-full">
                            <button
                                class="bg-white text-black px-4 py-2 w-full rounded-full flex items-center justify-center md:justify-start gap-2">
                                <i class="fa-solid fa-utensils"></i>
                                <span class="text-sm">Status</span>
                            </button>
                        </a>
                        <a href="{{ route('dashboard', ['tab' => 'newsletters']) }}" class="w-full">
                            <button
                                class="bg-white text-black px-4 py-2 w-full rounded-full flex items-center justify-center md:justify-start gap-2">
                                <i class="fa-solid fa-user"></i>
                                <span class="text-sm">Newsletters</span>
                            </button>
                        </a>
                        <a href="{{ route('dashboard', ['tab' => 'blog']) }}" class="w-full">
                            <button
                                class="bg-white text-black px-4 py-2 w-full rounded-full flex items-center justify-center md:justify-start gap-2">
                                <i class="fa-solid fa-calendar-days"></i>
                                <span class="text-sm">Blog</span>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="flex flex-col items-start w-full gap-5">
                    <a href="{{ route('profile.show') }}" class="w-full">
                        <button
                            class="bg-white text-black px-4 py-2 w-full rounded-full flex items-center justify-center md:justify-start gap-2">
                            <i class="fa-solid fa-user-tie"></i>
                            <span class="text-sm">Conta</span>
                        </button>
                    </a>

                    <form method="POST" action="{{ route('logout') }}" x-data
                        class="w-full bg-red-500 rounded-full py-1">
                        @csrf
                        <a href="{{ route('logout') }}" @click.prevent="$root.submit();"
                            class="flex items-center justify-center md:justify-start gap-2 text-white hover:text-gray-300 transition-colors w-full px-4">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="text-sm">Log Out</span>
                        </a>
                    </form>
                </div>
            </div>

            <div class="flex-1 bg-gray-100 p-2 sm:p-6 rounded-e-xl overflow-y-auto">
                @if ($tab === 'status')
                    @livewire('manage-status')
                @elseif ($tab === 'newsletters')
                    @livewire('manage-newsletters')
                @elseif ($tab === 'blog')
                    @livewire('manage-blog')
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
