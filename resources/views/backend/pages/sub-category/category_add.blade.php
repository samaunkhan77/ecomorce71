@extends('backend.layouts.app')

@section('admin')
    <section class="content-main">
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">Add New Product</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{@$editData? route('category.update', $editData->id) : route('category.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Category Name</label>
                                        <div class="row gx-2">
                                            <input placeholder="Category Name" type="text" name="category_name" class="form-control" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Category Slug</label>
                                        <input placeholder="Category Slug" type="text" name="category_slug" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Category Image</label>
                                        <input placeholder="Category Slug" type="file" name="category_image" class="form-control" id="categoryImageInput" required />
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
