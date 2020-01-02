<table id="company_list" class="table table-bordered table-hover text-center">
    <thead>
    <tr>
        <th style="width: 10%">S.N</th>
        <th>Name</th>
        <th>Moderator</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $company->title }}</td>
            <td id="moderator_{{ $company->id }}">{{ $company->moderator?$company->moderator->full_name():'' }}</td>
            <td>
                <div class="">
                    <div class="btn-group">
                        @if($company->moderator_id == $user->id)
                            <button type="button" data="{{ $company->id }}" data2="{{ $user->id }}" class="btn btn-danger revokeCompany" title="Revoke Moderator"><i class="fa  fa-close"></i></button>
                        @else
                            <button type="button" data="{{ $company->id }}" data2="{{ $user->id }}" class="btn btn-primary assignCompany" title="Assign Moderator"><i class="fa fa-check-square-o"></i></button>
                        @endif
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
        <th>Moderator</th>
        <th>Action</th>
    </tr>
    </tfoot>
</table>
<script>
    $(document).on('click','.assignCompany',function (e) {
        e.preventDefault();
        var company_id = $(this).attr('data');
        var user_name = '{{ $user->full_name() }}';
        var user_id = $(this).attr('data2');
        var url = "{{ route('admin.moderator.assignCompany') }}";
        var _this = $(this);
        $.ajax({
            type : 'GET',
            url : url,
            data : {
                'user_id' : user_id,
                'company_id' : company_id
            },
            success: function (data, data2, data3) {
                $('#moderator_'+company_id).html(user_name);
            },
            error: function(error) {
                alert(error.responseJSON.message);
            },
            complete: function(data, status){
                if(status == 'success'){
                    _this.parent().html('<button type="button" data="'+company_id+'" data2="'+user_id+'" class="btn btn-danger revokeCompany" title="Revoke Moderator"><i class="fa  fa-close"></i></button>');
                }
            }
        });
    });
    $(document).on('click','.revokeCompany',function (e) {
        e.preventDefault();
        var company_id = $(this).attr('data');
        var user_id = $(this).attr('data2');
        var url = "{{ route('admin.moderator.revokeCompany') }}";
        var _this = $(this);
        $.ajax({
            type : 'GET',
            url : url,
            data : {
                'company_id' : company_id
            },
            success: function (data, data2) {
                $('#moderator_'+company_id).html('');
            },
            error: function(error) {
                alert(error.responseJSON.message);
            },
            complete: function(data, status) {
                if(status == 'success'){
                    _this.parent().html('<button type="button" data="'+company_id+'" data2="'+user_id+'" class="btn btn-primary assignCompany" title="Assign Moderator"><i class="fa fa-check-square-o"></i></button>')
                }
            }
        });
    });
</script>
<script>
    $('#company_list').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
    })
</script>