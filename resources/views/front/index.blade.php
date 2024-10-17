<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    {{-- {{ dd($page_name) }} --}}
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @php
                        $user = Auth::user();
                    @endphp
                    <ul class="navbar-nav me-auto">
                        @guest
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    User
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    @if ($user->user_type == App\Enums\UserType::Administrator)
                                        <a @class([
                                            'dropdown-item',
                                            'active' => request()->is('admin/users/create'),
                                        ]) href="{{ route('admin.users.create') }}"> Add
                                        </a>
                                    @endif


                                    <a @class(['dropdown-item', 'active' => request()->is('admin/users')]) href="{{ route('admin.users.index') }}"> Manage
                                    </a>



                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Post
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if ($user->user_type == App\Enums\UserType::Administrator)
                                        <a @class([
                                            'dropdown-item',
                                            'active' => request()->is('admin/posts/create'),
                                        ]) href="{{ route('admin.posts.create') }}"> Add
                                        </a>
                                    @endif
                                    <a @class(['dropdown-item', 'active' => request()->is('admin/posts')]) href="{{ route('admin.posts.index') }}"> Manage
                                    </a>



                                </div>
                            </li>
                        @endguest

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">


            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('layouts.alert')

                        <div class="card">
                            <div class="card-header">{{ $page_name ?? '' }}</div>
                            <div class="card-body">
                                <div class="row row-cols-1 row-cols-md-2 g-4">
                                    @forelse ($objects as $key => $object)
                                        <div class="col-12 col-md-4">
                                            <div class="card-group">
                                                <div class="card">
                                                    <img src="{{ asset('media/background.jpg') }}" class="card-img-top"
                                                        alt="...">
                                                    <div class="card-body">
                                                        {{-- <div class="card-img-overlay">
                                                            <h3 class="card-title text-center">{{ $object->title ?? "" }}</h3>
                                                        </div> --}}
                                                        <h5 class="card-title">{{ $object->title ?? '' }}</h5>
                                                        <p> {!! Str::words(strip_tags($object->content), 20, '...') !!}</p>
                                                        <a href="{{ route('front_posts.view', $object->id) }}"
                                                            class="btn btn-primary">
                                                            <i class="bi bi-eye-fill"></i> View
                                                        </a>

                                                    </div>
                                                    <div class="card-footer">
                                                        <small class="text-muted">Published:
                                                            {{ date('Y-m-d', strtotime($object->published_at)) }}</small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @empty
                                        <div class="" role="">
                                            No Post Available
                                        </div>
                                    @endforelse


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>

</html>
