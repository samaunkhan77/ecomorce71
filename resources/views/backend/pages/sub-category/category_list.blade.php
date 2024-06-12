@extends('backend.layouts.app')
@section('admin')
    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">Category List</h2>
            <div>
                <a href="{{route('category.create')}}" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-center" width="5%">SL/NO</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center" width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center"><img src="{{asset('uploads/category/'.$item->category_image)}}" style="width: 50px; height: 50px; object-fit: contain;"></td>
                            <td class="text-center">{{$item->category_name}}</td>
                            <td class="text-center">{{$item->category_slug}}</td>
                            <td class="text-center">
                                <div>
                                    <a href="{{route('category.edit',$item->id)}}" class="btn btn-sm font-sm rounded bg-warning"><i class="material-icons md-edit"></i> Edit</a>
                                    <a href="{{route('category.delete',$item->id)}}" class="btn btn-sm font-sm rounded btn-danger"><i class="material-icons md-delete_forever"></i> Delete</a>
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
