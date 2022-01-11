@push('scripts')
<script src="{{ mix('js/navbar.js') }}" defer></script>
@endpush

<div class="fixed top-0 inset-x-0 z-50 shadow-md">
    <nav class="max-w-7xl mx-auto px-8 sm:px-4 lg:px-8 bg-white">
        <div class="flex items-center justify-between h-20">

            <!-- Mobile menu button-->
            <div class="h-full w-full relative flex items-center lg:hidden ">
                <button type="button" id="btn-mobile-menu"
                    class="z-20 inline-flex items-center justify-center p-2 rounded-md text-gray-700 focus:outline-none"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg id="hamburger-mobile-menu" class="block h-10 w-10" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="cross-mobile-menu" class="hidden h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="absolute w-full text-center lg:hidden animate-fade-in-down ">
                    <a href="{{ route('homepage') }}" class="uppercase font-bold text-2xl">
                        {{ config('app.name') }}
                    </a>
                </div>
                <div class="absolute w-full text-center lg:hidden animate-fade-in-down ">
                    <a href="{{ route('references.index') }}" class="uppercase font-bold text-2xl">
                        Références
                    </a>
                </div>
            </div>

            <!-- Standard menu -->
            <div class="flex-1 flex items-center justify-center lg:items-stretch lg:justify-start h-full ">
                <div class="hidden w-full h-full lg:flex space-x-4">
                    <x-nav.link name="Accueil" route="{{ route('homepage') }}" />
                    <x-nav.dropdown name="Domaines" route="{{ route('domains') }}" route-group="domain"
                        title="Liste des practiques par domaine">
                        <x-nav.dropdown-link name="Toutes {{ $domains->sum('practices_count') }}" route="{{ route('domains') }}" />
                        @foreach ($domains as $domain)
                        <x-nav.dropdown-link name="{!! $domain->name !!} {{ $domain->practices_count }}"
                            route="{{ route('domain.domain', ['domain' => $domain->slug]) }}" />
                        @endforeach
                    </x-nav.dropdown>
                    <x-nav.link name="Références" route="{{ route('references.index') }}" />

                    <!-- Login !-->
                    <div class="flex w-full justify-end">
                        @auth
                        <div class="flex items-center mr-4">
                            <div>{{ Auth::user()->fullname }} - {{ Auth::user()->name }}</div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                            @csrf
                            <button type="submit"
                                class="px-3 py-2 border-2 border-purple-500 hover:border-purple-400 rounded font-semibold text-purple-500 hover:text-purple-400">
                                Se déconnecter
                            </button>
                        </form>
                        @else
                        <a href="{{ route('login') }}"
                            class="flex items-center px-3 py-1 my-4 border-2 border-purple-500 hover:border-purple-400 rounded font-semibold text-purple-500 hover:text-purple-400">
                            Se connecter
                        </a>
                        <a href="{{ route('register') }}"
                            class="flex items-center px-3 py-1 my-4 border-2 border-purple-500 hover:border-purple-400 rounded font-semibold text-purple-500 hover:text-purple-400">
                            {{ __('Créer un compte') }}
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="hidden lg:hidden w-full" id="mobile-menu">
            <div class="px-4 py-2 pb-8 space-y-1">
                <x-nav.mobile-link name="Accueil" route="{{ route('homepage') }}" />
                <x-nav.mobile-dropdown name="Domaines" route-group="domain">
                    <x-nav.mobile-dropdown-link name="Toutes {{ $domains->sum('practices_count') }}"
                        route="{{ route('domains') }}" />
                    @foreach ($domains as $domain)
                    <x-nav.mobile-dropdown-link name="{!! $domain->name !!} {{ $domain->practices_count }}"
                        route="{{ route('domain.domain', ['domain' => $domain->slug]) }}" />
                    @endforeach
                </x-nav.mobile-dropdown>
            </div>
        </div>
    </nav>
</div>