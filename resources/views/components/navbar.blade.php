 <nav id="nav">

     <form id = "form-logout" action="/logout" method="post">
         @csrf
     </form>
     <ul class="main-menu nav navbar-nav navbar-right">
         <li><a href="{{ url('/') }}">@lang('web.home')</a></li>
         <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false">@lang('web.cat')<span class="caret"></span></a>
             <ul class="dropdown-menu">

                 @foreach ($cats as $cat)
                     <li><a href="{{ url("categories/show/{$cat->id}") }}">
                             {{ $cat->name() }}
                             {{-- فانكشن بتجيب لغة الموقع و بتدخل جوا الداتا بيز و بتساويها باللغة الموجودة --}}
                         </a>
                     </li>
                 @endforeach

             </ul>
         </li>
         <li><a href="{{ url('contact') }}">@lang('web.contact')</a></li>

         @guest
             <li><a href="{{ url('/login') }}">{{ __('web.signin') }}</a></li>
             <li><a href="{{ url('/register') }}">@lang('web.signup')</a></li>
         @endguest
         @auth()
             @if (Auth::user()->role->role == 'student')
                 <li><a href="{{ url('/profile') }}">@lang('web.profile')</a></li>
             @else
                 <li><a href="{{ url('/dashboard') }}">@lang('web.dashboard')</a></li>
             @endif
             <li><a id="logout-btn" href="{{ url('/logout') }}">@lang('web.signout')</a></li>
         @endauth

         @if (App::getLocale() == 'ar')
             <li><a href="{{ url('lang/set/en') }}">en</a></li>
         @else
             <li><a href="{{ url('lang/set/ar') }}">ع</a></li>
         @endif

     </ul>
 </nav>
