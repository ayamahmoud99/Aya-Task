
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
        <div class="card-body p-0">



            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 16px">#</th>
                    <th>title</th>
                    <th>description</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>image</th>
                    <th >Actions</th>
                </tr>
                </thead>
                @isset($products)
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product -> id}}</td>
                            <td>{{$product -> title}}</td>
                            <td>{{$product -> description}}</td>
                            <td>{{$product -> quantity}}</td>
                            <td>{{$product -> price}}</td>
                            <td>  <img src="{{asset('/uploads/products/' . $product->image)}}" width="60" height="60" /></td>
                            <td>
                                <div class="btn-group" role="group"
                                     aria-label="Basic example">
                                    <form method="POST" action="{{route('product.delete',$product -> id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Delete  </button>
                                    </form>


                                    <a href="{{route('product.edit',$product -> id)}}"
                                       class="btn btn-outline-success btn-min-width box-shadow-1 mr-1 mb-1">Update</a>


                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endisset
                {!! $products->links() !!}
            </table>


        </div>
@endsection

