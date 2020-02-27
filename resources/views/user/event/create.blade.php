@extends('user.master')
@section('title')
    Add Events
@endsection
@section('content')
    <div class="row">
        <section class="content col-md-12">
            <div class="box-content">
                <h3>Create Event</h3>

                <div class="profile-editor-side">
                    <form action="{{ route('user.event.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('user.event.form')
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Add">
                            <a href="{{ route('user.event.index') }}" type="button" class="btn btn-warning">Back</a>
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
            $('#event_list').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            });
            CKEDITOR.replace('description');
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