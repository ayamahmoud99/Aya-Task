@extends('admin.home')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Product</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">

                                <h3 class="card-title">Edit Product</h3>
                            </div>

                            <form action="{{route('product.update',$product->id)}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>title</label>
                                        <input type="text" value="{{$product->title}}" class="form-control"  name="title" >
                                    </div>
                                    <div class="form-group">
                                        <label >price</label>
                                        <input type="number" value="{{$product->price}}" class="form-control"  name="price" >
                                    </div>


                                    <div class="form-group">
                                        <label >description</label>
                                        <input type="text" value="{{$product->description}}" class="form-control"  name="description" >
                                    </div>


                                    <div class="form-group">
                                        <label >quantity</label>
                                        <input type="number" value="{{$product->quantity}}" class="form-control"  name="quantity" >
                                    </div>
                                    <div class="form-group">
                                        <label >image</label>
                                        <input type="file"   class="form-control"  name="image">
                                    </div>

                                </div>
                                <div class="card-footer">

                                    <button class="btn btn-primary"><input type="submit" value="update" ></button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>


@endsection
