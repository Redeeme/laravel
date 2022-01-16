@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Blogs</div>
                    <div class="card-body">
                        <table class="table table-hover table-condensed" id="userblogs_table">
                            <thead>
                            <th>#</th>
                            <th>Blog name</th>
                            <th>blog</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            @auth
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add new blogs</div>
                    <div class="card-body">
                        <form action="{{route('add.blog')}}" method=post id="add_blog_form">
                            @csrf
                            <div class="form-group">
                                <label for="">blog name</label>
                                <input type="text" class="form-control" name="blog_name" placeholder="enter blog name">
                                <span class="text-danger error-text blog_name_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">blog</label>
                                <input type="text" class="form-control" name="blog" placeholder="enter blog">
                                <span class="text-danger error-text blog_error"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-block btn-success">SAVE</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            @endauth
        </div>
    </div>

    <script>
        toastr.options.preventDuplicates = true;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function () {
            //ADD NEW BLOG
            $('#add_blog_form').on('submit', function (e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function () {
                        $(form).find('span.error-text').text('');
                    },
                    success:function (data){
                        if(data.code == 0){
                            $.each(data.error, function (prefix,val){
                                $(form).find('span.'+prefix+'_error').text(val[0]);
                            });
                        }else{
                            $(form)[0].reset();
                            $('#userblogs_table').DataTable().ajax.reload(null,false);
                            toastr.success(data.msg);
                        }
                    }
                });
            });
            //GET ALL BLOGS
            $('#userblogs_table').DataTable({
                processing:true,
                serverside:true,
                info:true,
                ajax:"{{route('get.userBlogs.list')}}",
                columns:[
                    {data:'id',name:'id'},
                    {data:'blog_name',name:'blog_name'},
                    {data:'blog',name:'blog'},
                ]
            });
        });
    </script>

@endsection
