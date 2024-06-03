<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div class="bg_confirmation_order mb-5">
        <div class="container">
          <div class="d-flex flex-column py-5">
            <img class="pb-3" src="/img/logo/Logo.png" alt="" />
            <div class="customer_content">
              <h1>Hey , you have a new order from {{$orders[0]->customer_name}}, enjoy!</h1>
            </div>
          </div>
    
          <div></div>
        </div>
      </div>
    
      <div class="invoice container mb-5">
        <h2>Your Order</h2>
        <ul>
            @foreach ($orders[0]->dishes as $dish)
          <li>
            <p>{{$dish->name}}</p>
            <p>Product price: € {{$dish->price}}</p>
          </li>
            @endforeach
        </ul>
        <h2>Total: € {{$orders[0]->total_price}}</h2>
      </div>

</body>
</html>

<style lang="scss">

.bg_confirmation_order {
    background-color: #f2ca39;
    border-bottom-right-radius: 10rem;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.4);
    padding-left: 1em;
    padding-bottom: 1em;
    margin-bottom: 1em;

    img {
        width: 100px;
        display: block;
    }

    h1 {
        font-size: 2rem;
        font-weight: 700;
        font-family: sans-serif;
    }

    .customer_content {
        max-width: 600px;
    }
}

.invoice {
    color: #f8f8f6;
    background-color: #37373b;
    border-radius: 24px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    padding: 1rem;

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    li {
        display: flex;
        justify-content: space-between;
        padding: 1rem 0;
    }

    h2 {
        padding: 1rem 0;
    }
}

</style>