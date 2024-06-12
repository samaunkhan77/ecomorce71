<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>Popular Products</h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Milks & Dairies</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">Coffes & Teas</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-four" data-bs-toggle="tab" data-bs-target="#tab-four" type="button" role="tab" aria-controls="tab-four" aria-selected="false">Pet Foods</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-five" data-bs-toggle="tab" data-bs-target="#tab-five" type="button" role="tab" aria-controls="tab-five" aria-selected="false">Meats</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-six" data-bs-toggle="tab" data-bs-target="#tab-six" type="button" role="tab" aria-controls="tab-six" aria-selected="false">Vegetables</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-seven" data-bs-toggle="tab" data-bs-target="#tab-seven" type="button" role="tab" aria-controls="tab-seven" aria-selected="false">Fruits</button>
                </li>
            </ul>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            @include('frontend.pages.product.tab-one')
            <!--En tab one-->
           @include('frontend.pages.product.tab-two')
            <!--En tab two-->
            @include('frontend.pages.product.tab-three')
            <!--En tab three-->
            @include('frontend.pages.product.tab-four')
            <!--En tab four-->
            @include('frontend.pages.product.tab-five')
            <!--En tab five-->
            @include('frontend.pages.product.tab-six')
            <!--En tab six-->
            @include('frontend.pages.product.tab-seven')
            <!--En tab seven-->
        </div>
        <!--End tab-content-->
    </div>
</section>
