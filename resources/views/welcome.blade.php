<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{__('core.opensourcefinancials')}}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">{{__('nav.home')}}</a>
            @else
                <a href="{{ route('login') }}">{{__('nav.login')}}</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            {{__('core.opensourcefinancials')}}
        </div>

        <div class="links">
            <a href="https://github.com/RuleDomain/OpenSourceFinancials/wiki">{{__('core.documentation')}}</a>
            <a href="https://github.com/RuleDomain/OpenSourceFinancials">{{__('core.github')}}</a>
        </div>
    </div>
</div>
</body>
</html>
