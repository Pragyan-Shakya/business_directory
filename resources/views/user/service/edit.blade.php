@extends('user.master')
@section('title')
    Services
@endsection
@section('content')
    <div class="row">
        <section class="content col-md-12">
            <div class="box-content">
                <h3>Add Service</h3>
                <div class="profile-editor-side">
                    <form action="{{ route('user.service.update', $service->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" value="{{ $service->title }}">
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon: <span style="font-size: 12px"><a target="_blank" href="https://fontawesome.com/v4.7.0/cheatsheet/">Visit THIS link for icon.</a></span>
                            </label>
                            <input type="text" name="icon" class="form-control" placeholder="fa-thumbs-up" value="{{ $service->icon }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control">{!! $service->description !!}</textarea>
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