@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="form-group mt-4">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('blogs.create')}}">
                        <button class="btn btn-primary float-right btn-sm">New Blog</button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table table-striped table-responsive text-nowrap pt-4 small">
                        <table class="table" id="rentals-table">
                            <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Publish Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{$blog->id}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>{{$blog->content}}</td>
                                    <td>{{$blog->publish_date}}</td>
                                    <td>
                                        <a href="{{route('blogs.edit',$blog->id)}}"><i
                                                class="fa fa-pen text-primary"></i></a>

                                        <form action="{{route('blogs.delete',$blog->id)}}" method="post"
                                              style="display: inline;" id="deleteForm{{$blog->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <i class="fa fa-trash text-danger"
                                               onclick="deleteOrg({{$blog->id}})"></i>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteOrg(id) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    var formId = '#deleteForm' + id
                    $(formId).submit();
                }
            })
        }
    </script>

@endsection
