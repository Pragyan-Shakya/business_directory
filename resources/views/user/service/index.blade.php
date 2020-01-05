@extends('user.master')
@section('title')
    Services
@endsection
@section('content')
    <div class="row">
        <section class="content col-md-5">
            <div class="box-content">
                <h3>Add Service</h3>
                <div class="profile-editor-side">
                    <form action="{{ route('user.service.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon: <span style="font-size: 12px"><a target="_blank" href="https://fontawesome.com/v4.7.0/cheatsheet/">Visit THIS link for icon.</a></span>
                            </label>
                            <input type="text" name="icon" class="form-control" placeholder="fa-thumbs-up">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control"></textarea>
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
                    <table id="service_list" class="table table-responsive table-bordered table-stripe table-hover text-center">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><i class="fa {{ $service->icon }}"></i></td>
                                    <td>{{ $service->title }}</td>
                                    <td>{!! $service->description !!}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('user.service.edit', $service->id) }}" class="btn btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <form action="{{ route('user.service.destroy', $service->id) }}" method="post">
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
                                <th>Icon</th>
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