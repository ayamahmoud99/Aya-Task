<section id="aya" class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @isset($products)
                @foreach($products as $product)
                    @include('home.includes.product')
                @endforeach
            @endisset()

        </div>
    </div>
</section>
<!-- end product section -->
