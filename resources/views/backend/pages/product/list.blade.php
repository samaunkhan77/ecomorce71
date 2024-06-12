@extends('backend.layouts.app')
@section('admin')
    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">Product List</h2>
            <div>
                <a href="{{route('product.create')}}" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-center" width="5%" style="font-size: 20px">SL/NO</th>
                            <th class="text-center" style="font-size: 20px">Code</th>
                            <th class="text-center" style="font-size: 20px">Name</th>
                            <th class="text-center" style="font-size: 20px">Brand</th>
                            <th class="text-center" style="font-size: 20px">Category</th>
                            <th class="text-center" style="font-size: 20px">Price</th>
                            <th class="text-center" style="font-size: 20px">Discount</th>
                            <th class="text-center" style="font-size: 20px">Selling Price</th>
                            <th class="text-center" style="font-size: 20px">Quantity</th>
                            <th class="text-center" style="font-size: 20px">Availability</th>
                            <th class="text-center" style="font-size: 20px">Status</th>
                            <th class="text-center" width="10%" style="font-size: 20px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $item)
                        <tr>
                            <td class="text-center" style="font-size: 20px">{{$loop->iteration}}</td>
                            <td class="text-center" style="font-size: 20px">{{$item->product_code}}</td>
                            <td class="text-center" style="font-size: 20px">{{@$item->brand->brand_name}}</td>
                            <td class="text-center" style="font-size: 20px">{{@$item->category->category_name}}</td>
                            <td class="text-center" style="font-size: 20px">{{$item->product_name}}</td>
                            <td class="text-center" style="font-size: 20px">{{$item->product_price}}</td>
                            <td class="text-center" style="font-size: 20px">{{$item->product_discount}}</td>
                            <td class="text-center" style="font-size: 20px">{{$item->product_selling_price}}</td>
                            <td class="text-center" style="font-size: 20px">{{$item->product_quantity}}</td>
                            <td class="text-center" style="font-size: 20px">{{$item->product_availability}}</td>
                            <td class="text-center" style="font-size: 20px">{{$item->product_status}}</td>
                            <td class="text-center">
                                <div>
                                    <a href="{{route('product.edit',$item->id)}}" class="btn btn-sm font-sm rounded bg-primary">
                                        <i class="material-icons md-remove_red_eye icon-bold"></i>
                                    </a>
                                    <a href="{{route('product.edit',$item->id)}}" class="btn btn-sm font-sm rounded bg-warning">
                                        <i class="material-icons md-edit icon-bold"></i>
                                    </a>
                                    <a href="{{route('product.delete',$item->id)}}" class="btn btn-sm font-sm rounded btn-danger">
                                        <i class="material-icons md-delete_forever icon-bold"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
