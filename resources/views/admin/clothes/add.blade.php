@extends('admin.layout.master')

@section('content')
    <!-- Main content -->
    @include('admin.layout.masseges')
    <section class="content">
        <form method="post" action="{{route('clothes.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create New Clothes</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Clothes Title</label>
                                <input value="{{old('title')}}" type="text" name="title" id="inputName"
                                       class="form-control">
                            </div>


                            <div class="form-group">
                                <label for="inputName">Clothes Description</label>
                                <input type="text" name="description" id="inputName" class="form-control"
                                       value="{{old('description')}}">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Clothes Price</label>
                                <input type="text" name="price" id="inputName" class="form-control"
                                       value="{{old('price')}}">
                            </div>



                            <div class="form-group">
                                <label for="inputStatus">Clothes Size :</label>
                                <select name="size" id="inputStat us" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option {{'S' == old('size') ? 'selected' : ''}}>S</option>
                                    <option {{'M' == old('size') ? 'selected' : ''}}>M</option>
                                    <option {{'L' == old('size') ? 'selected' : ''}}>L</option>
                                    <option {{'XL' == old('size') ? 'selected' : ''}}>XL</option>
                                    <option {{'XXL' == old('size') ? 'selected' : ''}}>XXL</option>
                                    <option {{'XXXL' == old('size') ? 'selected' : ''}}>XXXL</option>


                                </select>
                            </div>



                            <div class="form-group">
                                <label for="inputName">Clothes Featured:</label>

                                <input type="radio" name="featured"
                                       value="Yes" {{(old('featured') == "Yes") ? "checked" : ""}}> Yes
                                <input type="radio" name="featured"
                                       value="No" {{(old('featured') == "No") ? "checked" : ""}}> No
                            </div>


                            <div class="form-group">
                                <label for="inputName">Clothes Active:</label>

                                <input type="radio" name="active"
                                       value="Yes" {{(old('active') == "Yes") ? "checked" : ""}}> Yes
                                <input type="radio" name="active"
                                       value="No" {{(old('active') == "No") ? "checked" : ""}}> No
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Category Title :</label>
                                <select name="category_id" id="inputStat us" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}" {{old('category_id') == $cat->id ? 'selected' : ''}}>
                                            {{$cat->title}}
                                        </option>
                                    @endforeach
                                </select>
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
                    <input type="submit" value="Create New Clothes" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection

@section('title')
    Add Clothes page
@endsection
