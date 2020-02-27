@extends('user.master')
@section('title')
    Post Job
@endsection
@section('content')
    <div class="row">
        <section class="content col-md-12">
            <div class="box-content">
                <h3>Post a Job</h3>

                <div class="profile-editor-side">
                    <form action="{{ route('user.job.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('user.job.form')
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Add">
                            <a href="{{ route('user.job.index') }}" type="button" class="btn btn-warning">Back</a>
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
            CKEDITOR.replace('specification');
            $('#industry_id').select2();
            $('#job_level').select2();
            $('#job_type').select2();
            $('#deadline').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
            })
        })
    </script>
    <script>
        $(function () {
            var salary_type = $('#salary_type').val();
            salary_change(salary_type);
        });
        $('#salary_type').on('change', function () {
            var salary_type = $('#salary_type').val();
            salary_change(salary_type);
        });
        function salary_change(value) {
            if(value == 'Range'){
                $('#min-salary').show();
                $('input[name="min_salary"]').attr('required', 'required');
                $('#max-salary').show();
                $('input[name="max_salary"]').attr('required', 'required');
            }
            if(value == 'Fixed'){
                $('#min-salary').show();
                $('input[name="min_salary"]').attr('required', 'required');
                $('#max-salary').hide();
                $('input[name="max_salary"]').removeAttr('required');
            }
            if(value == 'Negotiable'){
                $('#min-salary').hide();
                $('input[name="min_salary"]').removeAttr('required');
                $('#max-salary').hide();
                $('input[name="max_salary"]').removeAttr('required');
            }
        }
    </script>
@endsection