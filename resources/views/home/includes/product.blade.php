<div class="col-sm-6 col-md-4 col-lg-3">
    <div class="box">

        <div class="img-box">
            <img src="{{asset('/uploads/products/' . $product->image)}}" width="100" height="100"
                 alt="">
        </div>
        <div class="detail-box">
            <h5>
                {{$product -> title}}
            </h5>
            <h6>
                {{$product -> price}}$
            </h6>

        </div>
        <br>

        <div><br>
            <div class="detail-box">
                @if($product->quantity)
                    <h3><a class="btn btn-primary" onclick="addQty({{$product}}, {{$loggedIn}})"/>+</a>
                    </h3>
                    <input type="text" id="qty-{{$product -> id}}" name="quantity" class="qty-input" value="{{$product->added_qty}}"
                           style="width:80px; height:40px">
                    <h3><a class="btn btn-danger" onclick="minusQty({{$product}},{{$loggedIn}})"/>-</a>
                    </h3>
                @endif


            </div>
        </div>
    </div>
</div>
<script>
    function addQty(product, loggedIn) {
        if (!loggedIn) {
            alert('you must login use cart')
            return;
        }
        const elem = document.getElementById('qty-' + product.id);
        let qty = Number(elem.value) ? Number(elem.value) : 0;
        if (product.quantity >= qty + 1) {
            elem.value = qty + 1;
            ajaxCall(product,qty + 1);
        }
    }

    function minusQty(product, loggedIn) {
        if (!loggedIn) {
            alert('you must login use cart')
            return;
        }
        const elem = document.getElementById('qty-' + product.id);
        let qty = Number(elem.value) ? Number(elem.value) : 0;
        if (qty > 0) {
            elem.value = qty - 1;
            ajaxCall(product,qty - 1);
        }

    }

    function ajaxCall(product , qty){
        const url = "carts/save_in_cart"
        let xhr = new XMLHttpRequest()
        const data = {
            "_token": "{{ csrf_token() }}",
            "id": product.id,
            'qty': qty
        };
        let post = JSON.stringify(data)
        xhr.open('POST', url, true)
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send(post);

        xhr.onload = function () {
            if (xhr.status === 201) {
                const elem = document.getElementById('cart_prod_number');
                const data = JSON.parse(xhr.responseText);
                elem.innerHTML = '('+ data.number_of_prod_in_cart + ')';
                if(data.removed){
                    alert('item removed from your cart')
                }

                if(data.added){

                    alert('item added to your cart successfully')
                }
            }else{

            }
        }
    }
</script>
