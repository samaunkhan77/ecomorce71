<div class="col-lg-1-5 col-md-4 col-12 col-sm-6 product-item">
    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a href='shop-product-right.html'>
                    <img src="{{asset('uploads/product/'.$item->product_thumbnail)}}" style="height: 246px;width: 246px">
                </a>
            </div>
            <div class="product-action-1">
                <a aria-label='Add To Wishlist' class='action-btn' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                <a aria-label='Compare' class='action-btn' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a>
                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
            </div>
            <div class="product-badges product-badges-position product-badges-mrg">
                <span class="hot">Hot</span>
            </div>
        </div>
        <div class="product-content-wrap">
            <div class="product-category">
                <a href='shop-grid-right.html'>{{@$item->category->category_name}}</a>
            </div>
            <h2><a href='shop-product-right.html'>{{@$item->product_name}}</a></h2>
            <div class="product-rate-cover">
                <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: 90%"></div>
                </div>
                <span class="font-small ml-5 text-muted"> (4.0)</span>
            </div>
            <div>
                <span class="font-small text-muted">By <a href='vendor-details-1.html'>{{@$item->user->name}}</a></span>
            </div>
            <div class="product-card-bottom">
                <div class="product-price">
                    <span><i class="fa-solid fa-bangladeshi-taka-sign"></i>{{@$item->product_selling_price}}</span>
                    <span class="old-price"><i class="fa-solid fa-bangladeshi-taka-sign"></i>{{@$item->product_price}}</span>
                </div>
                <div class="add-cart">
                    <a class='add' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                </div>
            </div>
        </div>
    </div>
</div>

