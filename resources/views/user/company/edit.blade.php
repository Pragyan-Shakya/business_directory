@extends('user.master')
@section('title')
    Update Company Profile
@endsection
@section('content')
    <div class="box-content">
        <div class="container-fluid">
            <form action="{{ route('user.company.update', $company->id) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('user.company.form')
                <div class="row">
                    <div class="form-group col-md-12" style="margin-top: 10px;">
                        <input type="submit" class="btn btn-info btn-block" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
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