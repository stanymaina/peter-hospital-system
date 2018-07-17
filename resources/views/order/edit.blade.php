<div class="card h-100">
    <div class="card-header">
        <h4 class="">
            <a href="{{url('products',$order->product_id)}}">{{$order->product->product_name}}</a>
        </h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> &times; </span>
        </button>
    </div>
    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
    <div class="card-body">
        <h4 class="card-title">
        </h4>
        <h5> Sold at : Ksh {{$order->order_price}}</h5>
        <p class="card-text">
            Buyers Name: {{$order->user->name}}
        </p>
        <p class="card-text">
            Hire Purchase Plan : {{$order->planId->hire_purchase_name}}
        </p>
        <p class="card-text">
            Payment : {{$order->payment_status}}
        </p>
    </div>
    <div class="card-footer">
        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
    </div>
</div>