@extends('backend.layouts.app')

@section('admin')
    <section class="content-main">
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">{{ @$editData ? 'Edit Product' : 'Add New Product' }}</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{@$editData ? route('product.update', $editData->id) : route('product.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label">Product Name</label>
                                        <div class="row gx-2">
                                            <input placeholder="Product Name" type="text" name="product_name" class="form-control" value="{{@$editData->product_name}}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label font-weight-bold">Product Slug</label>
                                        <input placeholder="Product Slug" type="text" name="product_slug" class="form-control" value="{{@$editData->product_slug}}" required/>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label">Product Category</label>
                                        <select name="category_id" class="form-select select2" required>
                                            <option value="" selected disabled>Select Category</option>
                                            @foreach($category as $item)
                                                <option value="{{ $item->id }}" {{@$editData->category_id == $item->id ? 'selected' : ''}}>{{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label">Sub Category</label>
                                        <select name="sub_category_id" class="form-select select2" required>
                                            <option value="" selected disabled>Select Sub Category</option>
                                            @foreach($sub_category as $item)
                                                <option value="{{ $item->id }}" {{@$editData->sub_category_id == $item->id ? 'selected' : ''}}>{{ $item->sub_category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label">Product Brand</label>
                                        <select name="brand_id" class="form-select select2" required>
                                            <option value="" selected disabled>Select Brand</option>
                                            @foreach($brand as $item)
                                                <option value="{{ $item->id }}" {{@$editData->brand_id == $item->id ? 'selected' : ''}}>{{ $item->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label">Sale Category</label>
                                        <select name="sale_category_id" class="form-select select2" required>
                                            <option value="" selected disabled>Select Sale Category</option>
                                            @foreach($sale_category as $item)
                                                <option value="{{ $item->id }}" {{@$editData->sale_category_id == $item->id ? 'selected' : ''}}>{{ $item->sale_category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label font-weight-bold">Product Quantity</label>
                                        <input placeholder="Product Quantity" type="number" name="product_quantity" class="form-control" value="{{@$editData->product_quantity}}"  />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label font-weight-bold">Product Price</label>
                                        <input placeholder="Product Selling Price" type="number" name="product_price" class="form-control" id="selling_price" value="{{@$editData->product_price}}" oninput="calculateFinalPrice()" required/>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label font-weight-bold">Product Discount</label>
                                        <input placeholder="Product Discount" type="number" name="discount_price" class="form-control" id="product_discount" value="{{@$editData->product_discount}}" oninput="calculateFinalPrice()" required/>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label font-weight-bold">Final Selling Price</label>
                                        <input placeholder="Final Selling Price" type="number" name="product_selling_price" id="product_selling_price" class="form-control" value="{{@$editData->product_selling_price}}" readonly />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label font-weight-bold">Product Weight</label>
                                        <input placeholder="Product Weight" type="number" name="product_weight" class="form-control" value="{{@$editData->product_weight}}" required/>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Product Availability</label>
                                        <select name="product_availability" class="form-select">
                                            <option value="">Select Availability</option>
                                            <option value="InStock" {{@$editData->product_availability == 'InStock' ? 'selected' : ''}}>InStock</option>
                                            <option value="OutStock" {{@$editData->product_availability == 'OutStock' ? 'selected' : ''}}>OutStock</option>
                                        </select>
                                    </div>
                                </div>
                                @if(auth()->user()->role == 'Admin')
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Product Status</label>
                                        <select name="product_status" class="form-select">
                                            <option value="">Select Availability</option>
                                            <option value="Approved" {{@$editData->product_status == 'Approved' ? 'selected' : ''}}>Approved</option>
                                            <option value="Pending" {{@$editData->product_status == 'Pending' ? 'selected' : ''}}>Pending</option>
                                            <option value="Rejected" {{@$editData->product_status == 'Rejected' ? 'selected' : ''}}>Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label">Short Description</label>
                                        <textarea placeholder="Product Description" type="text" name="short_description" cols="30" rows="10" class="form-control" >{{@$editData->short_description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label">Long Description</label>
                                        <textarea placeholder="Product Description" type="text" name="long_description" id="description" cols="30" rows="10" class="form-control" >{{@$editData->long_description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-4">
                                        <label class="form-label">Product Image</label>
                                        <input type="file" name="product_thumbnail" class="form-control" id="product_thumbnail" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-4">
                                        <label class="form-label">Product Image 1</label>
                                        <input type="file" name="product_image_1" class="form-control" id="product_image_1" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-4">
                                        <label class="form-label">Product Image 2</label>
                                        <input type="file" name="product_image_2" class="form-control" id="product_image_2" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-4">
                                        <label class="form-label">Product Image 3</label>
                                        <input type="file" name="product_image_3" class="form-control" id="product_image_3" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-4">
                                        <label class="form-label">Product Image 4</label>
                                        <input type="file" name="product_image_4" class="form-control" id="product_image_4" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-4">
                                        <label class="form-label">Product Image 5</label>
                                        <input type="file" name="product_image_5" class="form-control" id="product_image_5" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label class="form-label">Image Preview</label>
                                    <div id="imagePreviewThumbnail" style="border: 1px solid #ddd; padding: 10px; display: none;">
                                        <img id="imagePreviewThumbnailImg" src="#" alt="Image Preview" style="width: 100%; max-height: 200px; object-fit: contain;" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label class="form-label">Image Preview 1</label>
                                    <div id="imagePreview1" style="border: 1px solid #ddd; padding: 10px; display: none;">
                                        <img id="imagePreviewImg1" src="#" alt="Image Preview" style="width: 100%; max-height: 200px; object-fit: contain;" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label class="form-label">Image Preview 2</label>
                                    <div id="imagePreview2" style="border: 1px solid #ddd; padding: 10px; display: none;">
                                        <img id="imagePreviewImg2" src="#" alt="Image Preview" style="width: 100%; max-height: 200px; object-fit: contain;" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label class="form-label">Image Preview 3</label>
                                    <div id="imagePreview3" style="border: 1px solid #ddd; padding: 10px; display: none;">
                                        <img id="imagePreviewImg3" src="#" alt="Image Preview" style="width: 100%; max-height: 200px; object-fit: contain;" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label class="form-label">Image Preview 4</label>
                                    <div id="imagePreview4" style="border: 1px solid #ddd; padding: 10px; display: none;">
                                        <img id="imagePreviewImg4" src="#" alt="Image Preview" style="width: 100%; max-height: 200px; object-fit: contain;" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label class="form-label">Image Preview 5</label>
                                    <div id="imagePreview5" style="border: 1px solid #ddd; padding: 10px; display: none;">
                                        <img id="imagePreviewImg5" src="#" alt="Image Preview" style="width: 100%; max-height: 200px; object-fit: contain;" />
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary col-md-1 ml-5 mb-2 mt-2" type="submit">{{@$editData ? 'Update' : 'Submit'}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function previewImage(input, previewElementId, previewImageId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById(previewImageId);
                    img.src = e.target.result;
                    document.getElementById(previewElementId).style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                document.getElementById(previewElementId).style.display = 'none';
            }
        }

        document.getElementById('product_thumbnail').addEventListener('change', function(event) {
            previewImage(event.target, 'imagePreviewThumbnail', 'imagePreviewThumbnailImg');
        });

        document.getElementById('product_image_1').addEventListener('change', function(event) {
            previewImage(event.target, 'imagePreview1', 'imagePreviewImg1');
        });

        document.getElementById('product_image_2').addEventListener('change', function(event) {
            previewImage(event.target, 'imagePreview2', 'imagePreviewImg2');
        });

        document.getElementById('product_image_3').addEventListener('change', function(event) {
            previewImage(event.target, 'imagePreview3', 'imagePreviewImg3');
        });

        document.getElementById('product_image_4').addEventListener('change', function(event) {
            previewImage(event.target, 'imagePreview4', 'imagePreviewImg4');
        });

        document.getElementById('product_image_5').addEventListener('change', function(event) {
            previewImage(event.target, 'imagePreview5', 'imagePreviewImg5');
        });
    </script>
    <script>
        function calculateFinalPrice() {
            var sellingPrice = parseFloat(document.getElementById('selling_price').value) || 0;
            var discount = parseFloat(document.getElementById('product_discount').value) || 0;
            var finalPrice = sellingPrice - discount;
            document.getElementById('product_selling_price').value = finalPrice.toFixed(2);
        }
    </script>
@endsection
