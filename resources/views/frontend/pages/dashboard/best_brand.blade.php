<section class="popular-categories section-padding">
    <div class="container">
        <div class="section-title">
            <div class="title">
                <h3>Top Brands</h3>
                <a class='show-all' href='#'>
                    All Brands
                    <i class="fi-rs-angle-right"></i>
                </a>
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow" id="carausel-8-columns-arrows"></div>
        </div>
        <div class="carausel-8-columns-cover position-relative">
            <div class="carausel-8-columns" id="carausel-8-columns">
                @foreach($brand as $item)
                <div class="card-2">
                    <figure class="img-hover-scale overflow-hidden">
                        <img src="{{'uploads/brand/'.$item->brand_image}} " alt="" style="height: 100px;width: 100px" />
                        <a href='shop-grid-right.html'><img src="{{'uploads/brand/'.$item->brand_image}}" alt="" /></a>
                    </figure>
                    <h6>
                        <a href='shop-grid-right.html'>{{ $item->brand_name}}</a>
                    </h6>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
