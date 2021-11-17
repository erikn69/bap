<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('bap.direction') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(isset($title)){{ $title }} - @endif{{ config('bap.name', 'BAP') }}</title>

    @include('layouts.global.favicon')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles


</head>
<body class="antialiased">
<div class="wrapper">
    <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
        <div class="{{ config('bap.container', 'container-fluid') }}">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-dark.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                </a>
            </h1>
            <div class="navbar-nav flex-row d-lg-none">
                @include('layouts.global.user-navbar')
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="navbar-nav pt-lg-3">
                    @can('admin_dashboard_index')
                    <li class="nav-item @if(\Illuminate\Support\Facades\Route::is('admin.dashboard.index')) active @endif">
                        <a class="nav-link" href="{{ route('admin.dashboard.index') }}" >
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
	                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="13" r="2" /><line x1="13.45" y1="11.55" x2="15.5" y2="9.5" /><path d="M6.4 20a9 9 0 1 1 11.2 0z" /></svg>
                                    </span>
                            <span class="nav-link-title">
                                      {{ __('bap.dashboard') }}
                                    </span>
                        </a>
                    </li>
                    @endcan
                    @can('admin_user_management')
                    <li class="nav-item dropdown @if(\Illuminate\Support\Facades\Route::is('admin.user.*')) show @endif">
                        <a class="nav-link dropdown-toggle" href="#navbar-user" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                          <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                          </span>
                            <span class="nav-link-title">
                            {{ __('bap.user_management') }}
                          </span>
                        </a>
                        <div class="dropdown-menu @if(\Illuminate\Support\Facades\Route::is('admin.user.*')) show @endif " data-bs-popper="none">
                            @can('admin_user_index')
                            <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('admin.user.index')) active @endif" href="{{ route('admin.user.index') }}">
                                {{ __('bap.users') }}
                            </a>
                            @endcan
                                @can('admin_user_roles')
                            <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('admin.user.role.index')) active @endif" href="{{ route('admin.user.role.index') }}">
                                {{ __('bap.roles_word') }}
                            </a>
                                @endcan
                                    @can('admin_user_permissions')
                            <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('admin.user.permission.index')) active @endif" href="{{ route('admin.user.permission.index') }}">
                                {{ __('bap.permissions_word') }}
                            </a>
                                    @endcan
                        </div>
                    </li>
                    @endcan
                </ul>
            </div>
        </div>
    </aside>
    @include('layouts.global.header')
    <!-- Page Content -->
    <div class="page-wrapper">
        <main class="{{ config('bap.container', 'container-fluid') }}">
            @if(isset($pretitle))
                <div class="page-pretitle">
                    {{ $pretitle }}
                </div>
            @endif
            @if(isset($title))
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                {{ $title }}
                            </h2>
                            @if(isset($breadcrumb))
                                {{ $breadcrumb }}
                            @endif
                        </div>
                        @if(isset($actions))
                            {{ $actions }}
                        @endif
                    </div>
                </div>
            @endif
            <div class="page-body">

                {{ $slot }}
            </div>
        </main>
        @include('layouts.global.footer')
    </div>
</div>

@include('layouts.global.foot-js')
</body>
</html>
