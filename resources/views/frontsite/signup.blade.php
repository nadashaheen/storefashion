@extends('frontsite.layout.master')
@section('content')

    <div class="colorlib-shop">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <form action="{{route('do_register')}}" method="POST" class="colorlib-form">
                        @csrf
                        <h1>Sgin Up </h1>
                        <div class="row" >
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="fname">User Name </label>
                                    <input type="text" id="fname" name="name" class="form-control" placeholder="Enter Your Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="Phone">Phone Number</label>
                                    <input type="text" id="zippostalcode" name="phone" class="form-control" placeholder="Enter Your Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="email">E-mail </label>
                                    <input type="text" id="email" class="form-control" name="email" placeholder="Enter Your Email">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" class="form-control" name="address" placeholder="Enter Your Address">
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter Your Password">
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Sgin Up" class="btn btn-primary" style="float: right;width: 162px;">
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>




@endsection
@section('title')
    SginUp User
@endsection
