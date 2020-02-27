@extends('user.master')
@section('title')
    Notice
@endsection
@section('content')
    <div class="row">
        <section class="content col-md-12">
            <div class="box-content">
                <h3>Edit Notice</h3>
                <div class="profile-editor-side">
                    <form action="{{ route('user.notice.update', $notice->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" value="{{ $notice->title?$notice->title:old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control">{!! $notice->description?$notice->description:old('description') !!}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $('#service_list').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            });
//            CKEDITOR.replace('description');
            $('#industry_id').select2();
            $('#ownership').select2();
            $('#employers_id').select2();
            $('#datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
            })
        })
    </script>
@endsection