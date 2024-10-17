@extends('layouts.app')

@section('title', $page_name)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $page_name ?? '' }}</div>

                    <div class="card-body">
                        @include('layouts.alert')

                        <div class="row mt-3">
                            <div class="col-12">
                                <form action="{{ $route }}" method="POST">
                                    @csrf
                                    @if ($update)
                                        @method('PUT')
                                    @endif
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="name">Full Name</label>
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Full Name"
                                                value="{{ old('name') ? old('name') : $object->name ?? '' }}">
                                            @error('name')
                                                <span class="alert text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" name="email"
                                                id="email"class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email"
                                                value="{{ old('email') ? old('email') : $object->email ?? '' }}">
                                            @error('email')
                                                <span class="alert text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="mobile">Mobile</label>
                                            <input type="number" name="mobile"
                                                id="mobile"class="form-control @error('mobile') is-invalid @enderror"
                                                placeholder="Mobile"
                                                value="{{ old('mobile') ? old('mobile') : $object->mobile ?? '' }}">
                                            @error('mobile')
                                                <span class="alert text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        @if (!$update)
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="password">Password</label>
                                                <input type="password" name="password"
                                                    id="password" class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Password"
                                                    value="{{ old('password') ? old('password') : $object->password ?? '' }}">
                                                @error('password')
                                                    <span class="alert text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @else
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="password">Password</label>
                                                <input type="password" name="password"
                                                    id="password"class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Password" value="xxxxxxxx">
                                                @error('password')
                                                    <span class="alert text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="user_type">User Type</label>
                                            <select name="user_type"
                                                class="form-select select2 @error('user_type') is-invalid @enderror">
                                                <option value="">Select User Type</option>
                                                @foreach ($user_types as $key => $user_type)
                                                    @if ($key != 3)
                                                        <option value="{{ $key }}" {{-- @selected(old('user_type') ? old('user_type') : $object->user_type) --}}
                                                            @if (old('user_type') == $key || $object->user_type == $key) selected @endif>
                                                            {{ $user_type }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('user_type')
                                                <span class="alert text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12 mb-3">
                                            <button type="submit" class="btn btn-success"
                                                onclick="this.disabled=true; this.form.submit();">Submit</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
