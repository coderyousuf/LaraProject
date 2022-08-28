p<style>
    body{
        font-family: Arial, Helvetica, sans-serif
    }
    p{
        font-weight: 600px;
        font-size: 24px;
        color: red;
    }
</style>

<p>
    Prdouct: {{ $prdouct->name }} Created
</p>
<p>
    <img src="{{ asset('uploads/product-image/'.$product->image) }}" alt="">

</p>
