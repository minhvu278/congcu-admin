@extends('adminlte::page')

@section('title', 'Comments')

@section('content_header')
    <h1>Comments</h1>
@stop

@section('content')
    @include('partials.alerts')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Article</th>
            <th>User</th>
            <th>Content</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($comments as $index => $comment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $comment->article->title }}</td>
                <td>{{ $comment->user->name ?? 'Guest' }}</td>
                <td>{{ $comment->content }}</td>
                <td>{{ ucfirst($comment->status) }}</td>
                <td>
                    <button class="btn btn-warning btn-edit" data-id="{{ $comment->id }}"
                            data-status="{{ $comment->status }}" data-content="{{ $comment->content }}">Edit
                    </button>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $comments->links() }}
    </div>

    <div class="modal fade" id="editCommentModal" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editCommentForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCommentModalLabel">Edit Comment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="article-title">Article</label>
                            <input type="text" id="article-title" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label for="comment-content">Content</label>
                            <textarea id="comment-content" class="form-control" rows="4" disabled></textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btn-edit').click(function () {
            let commentId = $(this).data('id');
            let status = $(this).data('status');
            let content = $(this).data('content');

            $('#comment-content').val(content);
            $('#status').val(status);

            $('#editCommentForm').attr('action', '/comments/' + commentId + '/status');

            $('#editCommentModal').modal('show');
        });
    });
</script>
