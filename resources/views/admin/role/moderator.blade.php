@extends('admin.master')
@section('title')
    Moderators
@endsection
@section('style')
    <style>
        .material-switch > input[type="checkbox"] {
            display: none;
        }

        .material-switch > label {
            cursor: pointer;
            height: 0px;
            position: relative;
            width: 40px;
        }

        .material-switch > label::before {
            background: rgb(0, 0, 0);
            box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            content: '';
            height: 16px;
            margin-top: -8px;
            position:absolute;
            opacity: 0.3;
            transition: all 0.4s ease-in-out;
            width: 40px;
        }
        .material-switch > label::after {
            background: rgb(255, 255, 255);
            border-radius: 16px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
            content: '';
            height: 24px;
            left: -4px;
            margin-top: -8px;
            position: absolute;
            top: -4px;
            transition: all 0.3s ease-in-out;
            width: 24px;
        }
        .material-switch > input[type="checkbox"]:checked + label::before {
            background: inherit;
            opacity: 0.5;
        }
        .material-switch > input[type="checkbox"]:checked + label::after {
            background: inherit;
            left: 20px;
        }
        form .col-md-6{
            box-shadow: 2px 2px 1px 1px rgba(0, 0, 0, 0.2) !important;
        }
        .box-body{
            padding: 20px !important;
        }
    </style>
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View All Moderator
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="{{ route('admin.moderator.index') }}"><i class="fa fa-institute"></i>Moderator</a></li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Moderators</h3>
                        </div>
                        {{--////////////DataTable Start--}}
                        <div class="box-body">
                            <table id="moderator_list" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th style="width: 10%">S.N</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($moderators as $moderator)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $moderator->full_name() }}</td>
                                        <td>
                                            <div class="">
                                                <div class="btn-group">
                                                    <button type="button" data="{{ $moderator->id }}" class="btn btn-success getCompanies" title="Assign Companies"><i class="fa fa-bank"></i></button>
                                                </div>
                                                <div class="btn-group">
                                                    <button type="button" data="{{ $moderator->id }}" class="btn btn-info getUsers" title="Assign Users"><i class="fa fa-user-plus"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="assignment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#moderator_list').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
        })
    </script>
    <script>
        $('.getCompanies').click(function () {
            var id = $(this).attr('data');
            var url = "{{ route('admin.moderator.getCompanies', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                type : 'GET',
                url : url,
                success: function (data) {
                    $('.modal-body').html(data);
                    $('#exampleModalLabel').html('<b>Assign Company</b>');
                    $('#assignment').modal('show');
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
        $('.getUsers').click(function () {
            var id = $(this).attr('data');
            var url = "{{ route('admin.moderator.getUsers', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                type : 'GET',
                url : url,
                success: function (data) {
                    $('.modal-body').html(data);
                    $('#exampleModalLabel').html('<b>Assign User</b>');
                    $('#assignment').modal('show');
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    </script>

@endsection