@extends('user.master')
@section('title')
    Events
@endsection
@section('content')
    <div class="row">
        <section class="content col-md-12">
            <div class="box-content">
                <div style="padding: 10px;">
                    <a href="{{ route('user.event.create') }}" class="btn btn-info">Add Event</a>
                </div>
                <div class="profile-editor-side">
                    <table id="event_list" class="table table-responsive table-bordered table-stripe table-hover text-center">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->location }}</td>
                                <td>{{ date('d-M-Y', strtotime($event->event_date)) }}</td>
                                <td>{!! $event->description !!}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('user.event.edit', $event->id) }}" class="btn btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('user.event.destroy', $event->id) }}" method="post">
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
                                <th>Location</th>
                                <th>Date</th>
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
            $('#event_list').DataTable({
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