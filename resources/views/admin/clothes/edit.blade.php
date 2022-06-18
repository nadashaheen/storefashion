@extends('admin.layout.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="post" action="{{route('clothes.update',$clothes)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit clothes</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Clothes Title</label>
                                <input type="text" name="title" id="inputName" class="form-control"
                                       value="{{$clothes->title}}">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Clothes Description</label>
                                <input type="text" name="description" id="inputName" class="form-control"
                                       value="{{$clothes->description}}">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Clothes Price</label>
                                <input type="text" name="price" id="inputName" class="form-control"
                                       value="{{$clothes->price}}">
                            </div>



                            <div class="form-group">
                                <label for="inputStatus">Clothes Size :</label>
                                <select name="size" id="inputStat us" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option {{$clothes->size == 'S' ? 'selected' : ''}}>S</option>
                                    <option {{$clothes->size == 'M' ? 'selected' : ''}}>M</option>
                                    <option {{$clothes->size == 'L' ? 'selected' : ''}}>L</option>
                                    <option {{$clothes->size == 'XL' ? 'selected' : ''}}>XL</option>
                                    <option {{$clothes->size == 'XXL' ? 'selected' : ''}}>XXL</option>
                                    <option {{$clothes->size == 'XXXL'  ? 'selected' : ''}}>XXXL</option>


                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Clothes Featured:</label>

                                <input type="radio" name="featured"
                                       value="Yes" {{($clothes->featured == "Yes") ? "checked" : ""}}> Yes
                                <input type="radio" name="featured"
                                       value="No" {{($clothes->featured == "No") ? "checked" : ""}}> No
                            </div>


                            <div class="form-group">
                                <label for="inputName">Clothes Active:</label>

                                <input type="radio" name="active"
                                       value="Yes" {{($clothes->active == "Yes") ? "checked" : ""}}> Yes
                                <input type="radio" name="active"
                                       value="No" {{($clothes->active == "No") ? "checked" : ""}}> No
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Category Title :</label>
                                <select name="category_id" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach($categories as $cat)
                                        <option
                                            value="{{$cat->id}}" {{$clothes->category_id == $cat->id ? 'selected' : ''}}>
                                            {{$cat->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Current Image</label>
                                <br>
                                <img alt="Image" class="table-avatar"
                                     style=" border-radius: 2%; display: inline;width: 4rem;"
                                     src="{{asset('clothes_image/'.$clothes->image_name)}}">
                            </div>

                            <div class="form-group">

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image_name">
                                    <label class="custom-file-label" for="customFile">Choose image</label>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Edit clothes" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection

@section('title')
    Edit clothes page
@endsection
