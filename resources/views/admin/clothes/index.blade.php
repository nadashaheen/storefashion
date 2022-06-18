@extends('admin.layout.master')

@section('content')
    @include('admin.layout.masseges')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Clothes</h3>

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
                        <th>
                            #
                        </th>

                        <th >
                            Title
                        </th>

                        <th>
                            Description
                        </th>

                        <th>
                            Price
                        </th>

                        <th>
                            Size
                        </th>

                        <th>
                            Active
                        </th>

                        <th>
                            Featured
                        </th>

                        <th>
                            Image
                        </th>

                        <th>
                            Clothes Category
                        </th>

                        <th>

                        </th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach($clothes as $clo)

                        <tr>

                            <td>
                                {{$loop->iteration}}
                            </td>

                            <td>
                                <a>

                                    {{$clo->title}}
                                </a>
                                <br/>
                                <small>
                                    Created {{$clo->created_at}}
                                </small>
                            </td>
                            <td>{{$clo->description}}</td>
                            <td>{{$clo->price}}</td>
                            <td>{{$clo->size}}</td>
                            <td>{{$clo->active}}</td>
                            <td>{{$clo->featured}}</td>

                            <td>
                                <img alt="Image" class="table-avatar"
                                     style=" border-radius: 2%; display: inline;width: 4rem;"
                                     src="{{asset('clothes_image/'.$clo->image_name)}}">
                            </td>

                            <td> {{$clo->category->title?? '!!no cat'}}</td>



                            <td class="project-actions text-right">

                                <a class="btn btn-info btn-sm" href="{{route('clothes.edit',$clo)}}" style="float: left; margin: 10px;">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <form method="post" action="{{route('clothes.destroy',$clo)}}" style="float: left; margin: 10px;">
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
        {{$clothes->links()}}
    </section>
@endsection

@section('title')
    category page
@endsection
