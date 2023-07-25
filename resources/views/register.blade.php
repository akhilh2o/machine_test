@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-6 m-auto">
            <form method="POST" action="{{ route('user.register.store') }}" id="form">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"
                        placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="phone" name="mobile" class="form-control" id="mobile" aria-describedby="emailHelp"
                        placeholder="Enter Mobile">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $("#form").submit(function(e){
                e.preventDefault();
                let form_data = $("#form").serialize()
                $(document).find("span.text-danger").remove();
                $.ajax({
                    url : '{{ route('user.register.store') }}',
                    type : "POST",
                    data : form_data,
                    success : function(response){
                     if(response){
                        window.location.href='{{ route('admin.dashboard') }}';
                     }
                    },
                    error:function (response){
                        $.each(response.responseJSON.errors,function(field_name,error){
                            $(document).find('[name='+field_name+']').after('<span class="text-strong text-danger">' +error+ '</span>')
                        })
                    }
                });
            })
</script>

@endsection
