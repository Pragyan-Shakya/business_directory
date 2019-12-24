<script>
    @if(Session::has('success'))
        swal({
            title: "Success!",
            text: "{{ Session::get('success') }}",
            icon: "success",
        });
    @endif
    @if(Session::has('error'))
        swal({
            title: "Error!",
            text: "{{ Session::get('error') }}",
            icon: "error",
        });
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        @endforeach
        swal({
            title: "Warning!",
            text: "{{ $error }}",
            icon: "warning",
        });
    @endif
</script>