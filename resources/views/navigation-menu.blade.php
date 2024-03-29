{{-- Directiva de blade -  permiss writing php code--}} {{-- video 11 --}}
@php
    $nav_links = [
         [
           'name' => 'Home',
           'route' => route('home'),  /* este metodo busqua en archivo de routas , ruta con este nombre y nos devuelva su url  */
           'active' => request()->routeIs('home')  /* return  true | false */
         ],
         [
           'name' => 'Cursos',
           'route' => route('courses.index'),
           'active' => request()->routeIs('courses.*')

         ]

    ]
@endphp




<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow ">

    <!--TODO : Primary Navigation Menu , pantalla ordenador normal-->
    <div class="container">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"> {{-- se declara hidden flex => visible apartir sm: --}}

                      {{-- Directiva de blade --}}
                      @foreach ( $nav_links as $nav_link  )

                           {{-- component Jetstream  --}}
                           <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                           </x-jet-nav-link>

                      @endforeach




                </div>

            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Teams Dropdown -->
                @if(Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60"> {{-- componente de jestream  --}}

                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>


                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>

                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">

                @auth  {{-- directiva de blade muestra contenido solo cuando user esta autentificado --}}

                    <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">  {{-- slot de nombre --}}
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>


                                @can('See dashboard') {{--Directiva de blade recupera campo name de tabla permissions - asi si el user autenticado no consta del permiso declarado aqui no podra ver el link dentro del escop de la directiva--}}
                                  <x-jet-dropdown-link href="{{ route('admin.home') }}"> {{-- agragado por mi . rederige a la ruta instructor --}}
                                       {{-- hemos dado a la ruta nombre . asi se va apuntar el nombre del end-point --}}
                                      {{ __('Admin') }}
                                  </x-jet-dropdown-link>
                                @endcan


                                @can('Read Courses') {{--Directiva de blade recupera campo name de tabla permissions - asi si el user autenticado no consta del permiso declarado aqui no podra ver el link dentro del escop de la directiva--}}
                                    <x-jet-dropdown-link href="{{ route('instructor.courses.index') }}"> {{-- agragado por mi . rederige a la ruta instructor --}}
                                         {{-- hemos dado a la ruta nombre . asi se va apuntar el nombre del end-point --}}
                                        {{ __('Instructor') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}" {{-- componenete jestream -  --}}
                                                         onclick="event.preventDefault();
                                                         this.closest('form').submit();">

                                    {{ __('Log Out') }}  {{-- slot --}}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>

                    @else


                    <div class="align="right" width="48"">
                        <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')"> {{-- component de jestrem (Componente de blade anonimo) --}}
                            Login {{-- slot --}}
                       </x-jet-nav-link>
                       <x-jet-nav-link href="{{ route('register') }}" :active="request()->routeIs('register') ">
                            Register
                       </x-jet-nav-link>

                    </div>




                    @endauth

                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>


    <!--TODO : Responsive Navigation Menu Movil   -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

           @foreach ( $nav_links as $nav_link )

             {{-- Component Jesream --}}
              <x-jet-responsive-nav-link href="{{  $nav_link['route'] }}" :active="$nav_link['active']">
                  {{ $nav_link['name'] }}
              </x-jet-responsive-nav-link>

           @endforeach


        </div>

        <!-- Responsive Settings Options -->

      @auth
           <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @can('See dashboard')
                <x-jet-responsive-nav-link href="{{ route('admin.home') }}" :active="request()->routeIs('instructor.courses.index')">
                    {{ __('Admin') }}
                </x-jet-responsive-nav-link>
                @endcan

                @can('Read Courses')
                <x-jet-responsive-nav-link href="{{ route('instructor.courses.index') }}" :active="request()->routeIs('instructor.courses.index')">
                    {{ __('Instructor') }}
                </x-jet-responsive-nav-link>
                @endcan

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
           </div>

       @else

      {{--  <div class="pt-4 pb-1 border-t border-gray-200"> --}}

       {{--  <div class="mt-3 space-y-1"> --}}
            <div class="py-1 border-t border-gray-200">
                <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    Login
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    Register
                 </x-jet-responsive-nav-link>
            </div>

      {{--   </div> --}}

     {{--   </div> --}}



      @endauth

    </div>

</nav>
