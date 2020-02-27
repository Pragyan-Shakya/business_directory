@extends('user.master')
@section('title')
    Jobs
@endsection
@section('content')
    <div class="row">
        <section class="content col-md-12">
            <div class="box-content">
                <div style="padding: 10px;">
                    <a href="{{ route('user.job.create') }}" class="btn btn-info">Post Job</a>
                </div>
                <div class="profile-editor-side">
                    <table id="job_list" class="table table-responsive table-bordered table-stripe table-hover text-center">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Deadline</th>
                            <th>Created Date</th>
                            <th>View</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->location }}</td>
                                <td>{{ date('d-M-Y', strtotime($job->deadline)) }}</td>
                                <td>{{ date('d-M-Y', strtotime($job->created_at)) }}</td>
                                <td>{{ $job->view }}</td>
                                <td>{{ strtotime($job->deadline)<time()?'Expired':$job->status }}</td>
                                <td>
                                    <div style="display: inline-flex;">
                                        <a href="{{ route('user.job.edit', $job->id) }}" class="btn btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('user.job.destroy', $job->id) }}" method="post">
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
                            <th>Deadline</th>
                            <th>Created Date</th>
                            <th>View</th>
                            <th>Status</th>
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
            $('#job_list').DataTable({
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