@extends('backend.layouts.app')

@section('admin')
    <section class="content-main">
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">Add New Brand</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{@$editData? route('brand.update', $editData->id) : route('brand.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Brand Name</label>
                                        <div class="row gx-2">
                                            <input placeholder="Brand Name" type="text" name="brand_name" class="form-control" value=" {{@$editData->brand_name}}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Brand Slug</label>
                                        <input placeholder="Brand Slug" type="text" name="brand_slug" class="form-control" value=" {{@$editData->brand_slug}}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Brand Status</label>
                                        <select name="status" class="form-select">
                                            <option value="Active" {{@$editData->status == 'Active' ? 'selected' : ''}}>Active</option>
                                            <option value="Inactive" {{@$editData->status == 'Inactive' ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label">Brand Description</label>
                                        <textarea placeholder="Brand Description" type="text" name="brand_description" class="form-control"> {{@$editData->brand_description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Brand Image</label>
                                        <input placeholder="Brand Slug" type="file" name="brand_image" class="form-control" id="brandImageInput" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Image Preview</label>
                                    <div id="imagePreview" style="border: 1px solid #ddd; padding: 10px; display: none;">
                                        <img id="imagePreviewImg" src="{{asset('uploads/brand/..@$editData->brand_image')}}" alt="Image Preview" style="width: 100%; max-height: 200px; object-fit: contain;" />
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
    <script>
        document.getElementById('brandImageInput').addEventListener('change', function(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('imagePreviewImg');
                    img.src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                document.getElementById('imagePreview').style.display = '{{asset('admin/imgs/no_image')}}';
            }
        });
    </script>
@endsection
