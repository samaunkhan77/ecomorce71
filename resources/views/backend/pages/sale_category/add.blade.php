@extends('backend.layouts.app')

@section('admin')
    <section class="content-main">
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">Add New Sale Category</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{@$editData? route('sale.category.update', $editData->id) : route('sale.category.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Brand Name</label>
                                        <div class="row gx-2">
                                            <input placeholder="Brand Name" type="text" name="sale_category_name" class="form-control" value=" {{@$editData->sale_category_name}}" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary col-md-1 ml-5 mb-2 mt-2" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
