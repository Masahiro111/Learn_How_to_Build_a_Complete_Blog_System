@extends("admin_dashboard.layouts.app")

@section("style")

<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />

@endsection

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
            <div class="breadcrumb-title pe-3">Comments</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="p-0 mb-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Comment</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="p-4 card-body">
                <h5 class="card-title">Add New Comment</h5>
                <hr />

                <form action="{{ route('admin.comments.update', $comment) }}" method='post'>
                    @csrf
                    @method('PATCH')

                    <div class="mt-4 form-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-4 border rounded border-3">

                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Related Post</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="rounded">
                                                    <div class="mb-3">
                                                        <select required name='post_id' class="single-select">
                                                            @foreach($posts as $key => $post)
                                                            <option {{ $comment->post_id === $key ? 'selected' : '' }} value="{{ $key }}">{{ $post }}</option>
                                                            @endforeach
                                                        </select>

                                                        @error('post_id')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Post Comment</label>
                                        <textarea name='the_comment' id='post_comment' class="form-control" id="inputProductDescription" rows="3">{{ old("the_comment", $comment->the_comment) }}</textarea>

                                        @error('the_comment')
                                        <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button class='btn btn-primary' type='submit'>Update Comment</button>

                                    <a
                                       class='btn btn-danger'
                                       onclick="event.preventDefault(); document.getElementById('comment_delete_form_{{ $comment->id }}').submit()"
                                       href="#">Delete Comment</a>

                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <form id='comment_delete_form_{{ $comment->id }}' method='post' action="{{ route('admin.comments.destroy', $comment) }}">@csrf @method('DELETE')</form>

            </div>
        </div>


    </div>
</div>
<!--end page wrapper -->
@endsection

@section("script")
<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js') }}"></script>

<script>
    $(document).ready(function () {
        
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
        setTimeout(() => {
            $(".general-message").fadeOut();
        }, 5000);
    });
</script>
@endsection