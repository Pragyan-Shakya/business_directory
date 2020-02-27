@extends('user.master')
@section('title')
    Notice
@endsection
@section('content')
    <div class="row">
        <section class="content col-md-5">
            <div class="box-content">
                <h3>Add Notice</h3>
                <div class="profile-editor-side">
                    <form action="{{ route('user.notice.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control">{!! old('description') !!}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="content col-md-7">
            <div class="box-content">
                <div class="profile-editor-side">
                    <table id="notice_list" class="table table-responsive table-bordered table-stripe table-hover text-center">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notices as $notice)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $notice->title }}</td>
                                <td>{!! $notice->description !!}</td>
                                <td>
                                    <div style="display: inline-flex;">
                                        <a href="{{ route('user.notice.edit', $notice->id) }}" class="btn btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('user.notice.destroy', $notice->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Delete"><i class="fa fa-close"></i></button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $('#notice_list').DataTable({
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