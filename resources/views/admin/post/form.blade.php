@extends('layouts.app')

@section('title', $page_name)

@push('styles')

<style type="text/css">
    .ck-editor__editable_inline {
        min-height: 300px;
    }

</style>
@endpush

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
                                            <label for="title">Title</label>
                                            <input type="text" name="title"
                                                id="title"class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Title"
                                                value="{{ old('title') ? old('title') : $object->title ?? '' }}">
                                            @error('title')
                                                <span class="alert text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="col-12 mb-3">
                                            {{-- <div id="editor">
                                                <p>Hello from CKEditor 5!</p>
                                            </div> --}}
                                            <textarea name="content" id="content" cols="30" rows="10">{{ old('content') ? old('content') : $object->content ?? '' }}</textarea>
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
@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'),{
                ckfinder:{
                    uploadUrl:"{{ route('admin.posts.image_upload',['_token'=>csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.log(error);

            });
    </script>
@endpush
