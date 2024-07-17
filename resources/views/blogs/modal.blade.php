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

<!-- Modal for Edit Blog -->
<div class="modal fade" id="EditBlog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditBlog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditBlog">Blog Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('blogs.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label class="form-label" for="content">Title:</label>
                            <input type="text" class="form-control title" value="" name="title" id="title">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description">Content:</label>
                            <textarea class="form-control content" value="" name="content" id="content" aria-label="With textarea" style="resize: none"></textarea>
                        </div>
                        <input type="hidden" value="" name="blog_id" id="blog_id">
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