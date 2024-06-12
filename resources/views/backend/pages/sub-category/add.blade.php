@extends('backend.layouts.app')

@section('admin')
    <section class="content-main">
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">Add New Sub Category</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{@$editData? route('sub.category.update', $editData->id) : route('sub.category.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Category Name</label>
                                        <div class="row gx-2">
                                           <select class="form-select select2" name="category_id">
                                               <option selected disabled>Select Category</option>
                                               @foreach($categories as $category)
                                                   <option value="{{ $category->id }} {{@$editData->category_id == $category->id ? 'selected' : ''}}" >{{ $category->category_name }}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Sub Category Name</label>
                                        <input placeholder="Sub Category Name" type="text" name="sub_category_name" value="{{@$editData->sub_category_name}}" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Sub Category Slug</label>
                                        <input placeholder="Sub Category Slug" type="text" name="sub_category_slug"  value="{{@$editData->sub_category_slug}}" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label">Short Description</label>
                                        <textarea placeholder="Sub Category Description" type="text" name="sub_category_description" cols="30" rows="10" class="form-control" >{{@$editData->sub_category_description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Category Image</label>
                                        <input placeholder="Category Slug" type="file" name="sub_category_image" class="form-control" id="categoryImageInput" required />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Image Preview</label>
                                    <div id="imagePreview" style="border: 1px solid #ddd; padding: 10px; display: none;">
                                        <img id="imagePreviewImg" src="" alt="Image Preview" style="width: 100%; max-height: 200px; object-fit: contain;" />
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
        document.getElementById('categoryImageInput').addEventListener('change', function(event) {
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
