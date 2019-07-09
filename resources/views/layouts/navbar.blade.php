<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', '8B System') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a id="citySelectDropdown" class="nav-link dropdown-toggle text-capitalize" href="#"
                           role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ __('models/names.city') }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="citySelectDropdown">
                            @forelse(auth()->user()->cities as $city)
                                <a class="dropdown-item text-capitalize"
                                   href="{{ route('city.show', ['city' => $city->uuid]) }}">{{$city->name}}</a>
                            @empty
                                <span class="dropdown-item text-capitalize disabled">{{ __('views/layouts/navbar.no_cities_are_assigned_to_you') }}</span>
                            @endforelse
                        </div>
                    </li>
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="languageSelectDropdown" class="nav-link dropdown-toggle text-capitalize" href="#"
                           role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ getLocaleLanguageName() }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="languageSelectDropdown">
                            <form id="language-change-form" action="{{ route('language.changeLanguage') }}"
                                  method="POST">
                                @csrf
                                @foreach(config('language.acceptable_languages') as $languageCode)
                                    <div
                                            class="form-check dropdown-item"
                                            style="padding-left: 2.5em; padding-right: 1.5em;"
                                    >
                                        <input type="radio"
                                               name="languageCode"
                                               id="language-{{$languageCode}}"
                                               value="{{$languageCode}}"
                                               class="text-capitalize form-check-input"
                                               @if($languageCode == app()->getLocale())
                                               checked
                                               @endif
                                               @if($languageCode != app()->getLocale())
                                               onchange="document.getElementById('language-change-form').submit();"
                                                @endif
                                        />
                                        <label class="form-check-label"
                                               for="language-{{$languageCode}}">{{getLocaleLanguageName($languageCode)}}</label>
                                    </div>
                                @endforeach
                            </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="logOutDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="logOutDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>