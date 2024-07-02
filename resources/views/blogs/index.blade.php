@extends('layouts.app')
@section('content')
    @if(session('success'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-body shadow-lg">
                                        @foreach ($blogs as $blog)
                                            <div class="row ms-2 me-2 mb-4">
                                                <div class="card">
                                                    <h5 class="card-header">{{$blog->title}}</h5>
                                                    <div class="card-body">
                                                        {{$blog->content}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card shadow-sm">
                                        <div class="row g-0">
                                            <div class="col-md-1 bg-info-subtle">    
                                            </div>
                                            <div class="col-md-11">
                                                <div class="card-body">
                                                   <div class="row">
                                                        <div class="col-12">
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0">
                                                                    <img src="https://via.placeholder.com/100" class="img-thumbnail rounded-4 mb-3 object-fit-fill border rounded" alt="...">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3 mt-2">
                                                                    <div class="d-flex justify-content-center">
                                                                        <h4 class="card-title ms-2 me-3">{{Auth::user()->name}}</h>
                                                                    </div>
                                                                    <div class="d-flex align-items-center justify-content-center mx-0">
                                                                        <div class="p-2">200 Post</div>
                                                                        <div class="p-2">300 Followers</div>
                                                                        <div class="p-2">500 Following</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                        </div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Create Blog
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Modal for Insert Blog -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Blog Create</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('blogs.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label class="form-label" for="content">Title:</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description">Content:</label>
                            <textarea class="form-control" name="content" id="content" aria-label="With textarea" style="resize: none"></textarea>
                        </div>
                        <input type="hidden" value="{{Auth::id()}}" name="user_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
    </div>
</div>