@extends('layouts.app')

@section('title', $page_name)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $page_name }}</div>

                    <div class="card-body">


                        <form method="GET" action="{{ route('admin.posts.index') }}">
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                        value="{{ request('title') }}">
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

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            @if ($auth_user->user_type == App\Enums\UserType::Administrator)
                                                <th scope="col">Status</th>
                                            @endif

                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($objects as $key => $object)
                                            <tr>
                                                <th scope="row">{{ $object->id ?? '' }}</th>
                                                <td>{{ $object->title ?? '' }}</td>
                                                @if ($auth_user->user_type == App\Enums\UserType::Administrator)
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input status-checkbox" type="checkbox"
                                                                value="{{ $object->status }}"
                                                                id="status-{{ $object->id }}" name="status"
                                                                data-id="{{ $object->id }}"
                                                                {{ $object->status == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="status-{{ $object->id }}"
                                                                id="status-lable-{{ $object->id }}">
                                                                {{ $object->status == 1 ? 'Published' : 'Pending' }}
                                                            </label>
                                                        </div>

                                                    </td>
                                                @endif

                                                <td class="text-nowrap">
                                                    <div class="d-flex align-items-center">
                                                        <a type="button"
                                                            href="{{ route('admin.posts.display', $object->id) }}"
                                                            class="btn btn-info btn-sm mx-2 text-white" target="_blank">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </a>

                                                        @if ($auth_user->user_type == App\Enums\UserType::Administrator)
                                                            <a type="button"
                                                                href="{{ route($btn_route_edit, $object->id) }}"
                                                                class="btn btn-warning btn-sm mx-2 text-white">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </a>
                                                        @endif

                                                    </div>


                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">No Data Available</td>
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

@push('scripts')
    <script>
        $(document).ready(function() {

            $('.status-checkbox').change(function() {

                var objectId = $(this).data('id');
                var status = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: '/admin/posts/change_status',
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: objectId,
                        status: status
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            timer: 2500
                        })

                        $('#status-lable-' + objectId).text(response.lable);
                        console.log('Status updated successfully:', response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating status:', error);
                    }
                });
            });
        });
    </script>
@endpush
