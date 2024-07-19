@extends('layouts.app')
@section('content')
    @if(session('success'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-square"></i>
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
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h5 class="card-title mt-2 fw-bolder">{{$blog->title}}</h5> <!-- Content Title -->
                                                            </div>
                                                                <div class="col-6 text-end">
                                                                    <div class="dropdown">
                                                                        <a class="border-none shadow-none text-dark mt-2" type="button" href="javascript:void(0)" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="fas fa-ellipsis-v fw-bolder fs-5"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu">
                                                                            <?php if($blog->user_id == Auth::user()->id):?>
                                                                                <li><button class="dropdown-item btn-edit" type="button" data-bs-toggle="modal" data-bs-target="#EditBlog" data-id="{{$blog->id}}">Edit</button></li>
                                                                                <li><button class="dropdown-item btn-delete" type="button" data-bs-toggle="modal" data-bs-target="#DeleteBlog" data-id="{{$blog->id}}">Delete</button></li>
                                                                            <?php endif;?>
                                                                                <li><button class="dropdown-item" type="button">Report</button></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body"> <!--Content Area -->
                                                        {!! nl2br($blog->content) !!}
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
                                                       <div class="row mb-2">
                                                            <div class="col-12 d-none comment-box">
                                                                <div class="input-group">
                                                                    <textarea class="form-control custom-control" rows="1" name="comment" id="comment" aria-label="With textarea" style="resize:none"></textarea>     
                                                                    <span class="input-group-addon btn btn-primary"><i class="fa fa-pen mt-1"></i></span>
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
            // Like Button Functionality 
            $('.btn-like').click(function() {
                $(this).toggleClass('text-primary');
                var likeCount = $(this).closest('.card-footer').find('.like-count');
                if ($(this).hasClass('text-primary')) {
                    likeCount.text('1');
                } else {
                    likeCount.text('0');
                }
            });

            // Comment Button Functionality
            $('.btn-comment').click(function() {
                var commentBox = $(this).closest('.card-footer').find('.comment-box');
                if (commentBox.hasClass('d-none')) {
                    commentBox.removeClass('d-none');
                    commentBox.show();
                } else {
                    commentBox.addClass('d-none');
                    commentBox.hide();
                }
            });

            $('.btn-edit').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/blogs/edit/' + id,
                    type: 'GET',
                    success: function(response) {
                        $('.title').val(response.title);
                        $('.content').val(response.content);
                        $('#blog_id').val(id);
                    }
                });
            });

            $('.btn-delete').on('click', function() {
                var id = $(this).data('id');
                $('#DeleteBlog').find('#blog_id').val(id);
            });
        });
    </script>
@endsection