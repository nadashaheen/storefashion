@extends('admin.layout.master')

@section('content')
    @include('admin.layout.masseges')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Users</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">

                    <thead>


                    <tr>
                        <th style="width: 1%">
                            #
                        </th>

                        <th style="width: 30%">
                            Name
                        </th>

                        <th>
                            Address
                        </th>

                        <th>Phone Number</th>
                        <th>Email</th>

                        <th>
                            Action
                        </th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $user)

                        <tr>

                            <td>
                                {{$loop->iteration}}
                            </td>

                            <td>
                                <a>

                                    {{$user->name}}
                                </a>
                                <br/>
                                <small>
                                    Created {{$user->created_at}}
                                </small>
                            </td>

                            <td>
                                <a>

                                    {{$user->address}}
                                </a>
                            </td>

                            <td>
                                <a>

                                    {{$user->phone}}
                                </a>
                            </td>

                            <td>
                                <a>

                                    {{$user->email}}
                                </a>
                            </td>





                            <td class="project-actions text-right">

                                <form method="post" action="{{route('user.destroy',$user)}}"
                                      style="float: left; margin: 10px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>


                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        {{$users->links()}}
    </section>
@endsection

@section('title')
    User page
@endsection
