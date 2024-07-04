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
                                    <div class="card-body shadow-lg overflow-auto" style="max-width: 1000px; max-height: 1000px">
                                        @foreach ($blogs as $blog)
                                            <div class="row-mb mb-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title mt-2 fw-bolder">{{$blog->title}}</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        {{$blog->content}}
                                                    </div>
                                                    <div class="card-footer bg-light">
                                                       <div class="row">
                                                            <div class="d-flex flex-row px-0">
                                                                <div class="p-1">
                                                                    <a class="btn btn-light btn-like" href="javascript:void(0)">
                                                                        <i class="fa fa-heart fs-5" id="like-icon"></i>
                                                                        <span class="mt-1 fs-6 like-count">0</span>
                                                                    </a>
                                                                </div>
                                                                <div class="p-1">
                                                                    <a class="btn btn-light btn-comment shadow-none" href="javascript:void(0)">
                                                                        <i class="fa fa-comment fs-5"></i>
                                                                        <span class="mt-1 fs-6 comment-count">0</span>
                                                                    </a>
                                                                </div>
                                                                <div class="p-1">
                                                                    <a class="btn btn-light btn-share shadow-none" href="javascript:void(0)">
                                                                        <i class="fa fa-share fs-5"></i>
                                                                        <span class="mb-1 fs-6">Share</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                       </div>
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
    @extends('blogs.modal')


<!-- JS Area -->
    <script type="module">
        $(document).ready(function() {
            $('.btn-like').click(function() {
                $(this).toggleClass('text-primary');
                if ($(this).hasClass('text-primary')) {
                    $('.like-count').text('1');
                } else {
                    $('.like-count').text('0');
                }
            });
        });
    </script>
    </script>
@endsection