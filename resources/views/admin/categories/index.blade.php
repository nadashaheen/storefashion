@extends('admin.layout.master')

@section('content')
    @include('admin.layout.masseges')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>

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
                            Title
                        </th>

                        <th>
                            Image
                        </th>

                        <th>

                        </th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)

                        <tr>

                            <td>
                                {{$loop->iteration}}
                            </td>

                            <td>
                                <a>

                                    {{$category->title}}
                                </a>
                                <br/>
                                <small>
                                    Created {{$category->created_at}}
                                </small>
                            </td>


                            <td>
                                <img alt="Image" class="table-avatar"
                                     style=" border-radius: 2%; display: inline;width: 4rem;"
                                     src="{{asset('category_image/'.$category->image_name)}}">
                            </td>


                            <td class="project-actions text-right">
{{--                                <a class="btn btn-primary btn-sm" href="{{route('category.show',$category)}}" style="float: left; margin: 10px;">--}}
{{--                                    <i class="fas fa-folder">--}}
{{--                                    </i>--}}
{{--                                    View--}}
{{--                                </a>--}}
                                <a class="btn btn-info btn-sm" href="{{route('category.edit',$category)}}" style="float: left; margin: 10px;">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <form method="post" action="{{route('category.destroy',$category)}}" style="float: left; margin: 10px;">
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
        {{$categories->links()}}
    </section>
@endsection

@section('title')
    category page
@endsection
