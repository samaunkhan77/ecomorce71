<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section-title">
            <div class="title">
                <h3>Featured Categories</h3>
                {{--<ul class="list-inline nav nav-tabs links">
                    <li class="list-inline-item nav-item"><a class='nav-link' href='shop-grid-right.html'>Cake & Milk</a></li>
                    <li class="list-inline-item nav-item"><a class='nav-link' href='shop-grid-right.html'>Coffes & Teas</a></li>
                    <li class="list-inline-item nav-item"><a class='nav-link active' href='shop-grid-right.html'>Pet Foods</a></li>
                    <li class="list-inline-item nav-item"><a class='nav-link' href='shop-grid-right.html'>Vegetables</a></li>
                </ul>--}}
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
        </div>
        <div class="carausel-10-columns-cover position-relative">
            <div class="carausel-10-columns" id="carausel-10-columns">
                @foreach(@$category as  $value)
                    <div class="card-2 bg-11 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href='shop-grid-right.html'><img src="{{'uploads/category/'.$value->category_image}}" alt="" /></a>
                        </figure>
                        <h6><a href='shop-grid-right.html'>{{$value->category_name}}</a></h6>
                        <span>14 items</span>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
