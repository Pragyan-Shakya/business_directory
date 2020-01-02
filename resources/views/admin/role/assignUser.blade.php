<table id="user_list" class="table table-bordered table-hover text-center">
    <thead>
    <tr>
        <th style="width: 10%">S.N</th>
        <th>Name</th>
        <th>Moderator</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->full_name() }}</td>
            <td id="moderator_{{ $user->id }}">{{ $user->moderator?$user->moderator->full_name():'' }}</td>
            <td>
                <div class="">
                    <div class="btn-group">
                        @if($user->moderator_id == $moderator->id)
                            <button type="button" data="{{ $user->id }}" class="btn btn-danger revokeUser" title="Revoke Moderator"><i class="fa  fa-close"></i></button>
                        @else
                            <button type="button" data="{{ $user->id }}" class="btn btn-primary assignUser" title="Assign Moderator"><i class="fa fa-check-square-o"></i></button>
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
    $(document).on('click','.assignUser',function (e) {
        e.preventDefault();
        var user_id = $(this).attr('data');
        var moderator_name = '{{ $moderator->full_name() }}';
        var moderator_id = '{{ $moderator->id }}';
        var url = "{{ route('admin.moderator.assignUser') }}";
        var _this = $(this);
        $.ajax({
            type : 'GET',
            url : url,
            data : {
                'user_id' : user_id,
                'moderator_id' : moderator_id
            },
            success: function (data, data2, data3) {
                $('#moderator_'+user_id).html(moderator_name);
            },
            error: function(error) {
                alert(error.responseJSON.message);
            },
            complete: function(data, status){
                if(status == 'success'){
                    _this.parent().html('<button type="button" data="'+user_id+'" class="btn btn-danger revokeUser" title="Revoke Moderator"><i class="fa  fa-close"></i></button>');
                }
            }
        });
    });
    $(document).on('click','.revokeUser',function (e) {
        e.preventDefault();
        var user_id = $(this).attr('data');
        var moderator_name = '{{ $user->full_name() }}';
        var moderator_id = '{{ $user->id }}';
        var url = "{{ route('admin.moderator.revokeUser') }}";
        var _this = $(this);
        $.ajax({
            type : 'GET',
            url : url,
            data : {
                'user_id' : user_id
            },
            success: function (data, data2) {
                $('#moderator_'+user_id).html('');
            },
            error: function(error) {
                alert(error.responseJSON.message);
            },
            complete: function(data, status) {
                if(status == 'success'){
                    _this.parent().html('<button type="button" data="'+user_id+'" class="btn btn-primary assignUser" title="Assign Moderator"><i class="fa fa-check-square-o"></i></button>')
                }
            }
        });
    });
</script>
<script>
    $('#user_list').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
    })
</script>