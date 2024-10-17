@extends('layouts.app')

@section('title', $page_name)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-header">{{ $page_name }}</div>

                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-12">

                                <h2 class="text-center">{{ $object->title }}</h2>
                                <p>
                                    {!! $object->content !!}
                                </p>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
