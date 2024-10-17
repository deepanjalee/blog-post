@extends('layouts.app')

@section('title', $page_name)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $page_name }}</div>

                    <div class="card-body">


                        <form method="GET" action="{{ route('admin.users.index') }}">
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="common_search">Name | Email | Mobile</label>
                                    <input type="text" name="common_search" id="common_search"
                                        class="form-control @error('common_search') is-invalid @enderror"
                                        placeholder="Name | Email | Mobile" value="{{ request('common_search') }}">
                                </div>
                                <div class="col-12 col-md-6 mt-4 text-end">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>

                        </form>

                        <hr>

                        @include('layouts.alert')
                        <div class="row mt-3">
                            <div class="col-12">

                                {{-- @dd($auth_user); --}}
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">User Type</th>
                                            @if ($auth_user->user_type == App\Enums\UserType::Administrator)
                                                <th scope="col">Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($objects as $key => $object)
                                            <tr>
                                                <th scope="row">{{ $object->id ?? '' }}</th>
                                                <td>{{ $object->name ?? '' }}</td>
                                                <td>{{ $object->mobile ?? '' }}</td>
                                                <td>{{ $object->email ?? '' }}</td>
                                                <td>{{ $object->user_type_name ?? '' }}</td>
                                                @if ($auth_user->user_type == App\Enums\UserType::Administrator)
                                                    <td class="text-nowrap">
                                                        <div class="d-flex align-items-center">
                                                            <a type="button"
                                                                href="{{ route($btn_route_edit, $object->id) }}"
                                                                class="btn btn-warning btn-sm mx-2 text-white">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </a>

                                                            <form action="{{ route($btn_route_delete, $object->id) }}"
                                                                method="POST">
                                                                @method('DELETE')
                                                                @csrf

                                                                <button class=" btn btn-danger btn-sm mx-2 text-white">
                                                                    <i class="bi bi-trash3-fill"></i>
                                                                </button>
                                                            </form>
                                                        </div>


                                                    </td>
                                                @endif


                                            </tr>
                                        @empty
                                            <tr>
                                                <th colspan="6">No Data Found</th>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                </table>

                                @if ($objects->hasPages())
                                    <div class="pagination-wrapper">
                                        {{ $objects->links() }}
                                    </div>
                                @endif

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
