@extends('admin.master')
@section('title')
    Edit Company
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Company Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class=""><a href="{{ route('admin.company.index') }}"><i class="fa fa-institute"></i>Company</a>
                </li>
                <li class="active">Edit Company</li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Company Profile</h3>
                        </div>
                        {{--//////////Form Start--}}
                        <div class="box-body">
                            <form action="{{ route('admin.company.update', $company->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.company.form')
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <input type="submit" class="btn btn-info btn-block" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            CKEDITOR.replace('description');
            $('#industry_id').select2();
            $('#ownership').select2();
            $('#employers_id').select2();
            // $('#province_id').select2();
            // $('#district_id').select2();
            // $('#municipal_id').select2();
            $('#datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
            });
           var province_id = $('#province_id').val();
        });

        $(function () {
            var province_id = '{{ $company->province_id }}';
            var district_id = '{{ $company->district_id }}';
            var municipal_id = '{{ $company->municipal_id }}';
            $.ajax({
                type: 'get',
                url: '{{ route('getDistrict') }}',
                data: {
                    'province_id' : province_id,
                },
                success: function(data){
                    var districtOptions = '<option value="">Select District</option>';
                    data.data.forEach(function (item, index) {
                        if(item.id == district_id){
                            districtOptions += '<option value="'+item.id+'" selected>'+item.district_name+'</option>';
                        }else{
                            districtOptions += '<option value="'+item.id+'">'+item.district_name+'</option>';
                        }
                    });
                    $('#district_id').html(districtOptions);
                    $.ajax({
                        type: 'get',
                        url: '{{ route('getMunicipal') }}',
                        data: {
                            'district_id' : district_id,
                        },
                        success: function(data){
                            var municipalOptions = '<option value="">Select Municpals</option>';
                            data.data.forEach(function (item, index) {
                                if(item.id == municipal_id){
                                    municipalOptions += '<option value="'+item.id+'" selected>'+item.municipal_name+'</option>';
                                }else{
                                    municipalOptions += '<option value="'+item.id+'">'+item.municipal_name+'</option>';
                                }
                            });
                            $('#municipal_id').html(municipalOptions);
                        },
                        error: function (error) {
                            console.error(error)
                        }
                    })
                },
                error: function (error) {
                    console.error(error)
                }
            })

        });

        $('#province_id').on('change', function (e) {
            e.preventDefault();
            $('#district_id').html('');
            $('#municipal_id').html('');
            var provinceId = $(this).val();
            var districts = getDistrict(provinceId);
        });
        $('#district_id').on('change', function (e) {
            e.preventDefault();
            $('#municipal_id').html('');
            var districtId = $(this).val();
            var municiaps = getMunicipal(districtId);
        });
        function getDistrict(provinceId){
            $.ajax({
                type: 'get',
                url: '{{ route('getDistrict') }}',
                data: {
                    'province_id' : provinceId,
                },
                success: function(data){
                    var districtOptions = '<option value="">Select District</option>';
                    data.data.forEach(function (item, index) {
                        districtOptions += '<option value="'+item.id+'">'+item.district_name+'</option>';
                    });
                    $('#district_id').html(districtOptions);
                },
                error: function (error) {
                    console.error(error)
                }
            })
        }
        function getMunicipal(districtId){
            $.ajax({
                type: 'get',
                url: '{{ route('getMunicipal') }}',
                data: {
                    'district_id' : districtId,
                },
                success: function(data){
                    var municipalOptions = '<option value="">Select Municpals</option>';
                    data.data.forEach(function (item, index) {
                        municipalOptions += '<option value="'+item.id+'">'+item.municipal_name+'</option>';
                    });
                    $('#municipal_id').html(municipalOptions);
                },
                error: function (error) {
                    console.error(error)
                }
            })
        }
    </script>
@endsection
