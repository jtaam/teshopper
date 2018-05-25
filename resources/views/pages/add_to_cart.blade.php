@extends('layout')
@section('content')
    <section id="cart_items">
        <div class="container col-sm-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <?php
                $contents = Cart::content();
//                echo '<pre>';
//                var_dump($contents);
//                print_r($contents);
//                echo '</pre>';
                ?>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contents as $v_content)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{URL::to($v_content->options->image)}}" height="80px" width="80px"
                                                alt="{{$v_content->name}}"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$v_content->name}}</a></h4>

                            </td>
                            <td class="cart_price">
                                <p>${{$v_content->price}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <form action="{{URL::to('update-cart')}}" method="post">
                                        {{csrf_field()}}
                                        <input class="cart_quantity_input" type="text" name="qty"
                                               value="{{$v_content->qty}}" autocomplete="off" size="2">
                                        <input type="hidden" name="rowId" value="{{$v_content->rowId}}">
                                        <input type="submit" name="submit" value="update"
                                               class="btn btn-sm btn-default">
                                    </form>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">${{$v_content->total()}}</p>
                            </td>
                            <td class="cart_delete">

                                <a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$v_content->rowId)}}"><i
                                            class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                            <li>Eco Tax <span>{{Cart::tax()}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{Cart::total()}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a><br>

                        {{--<li><a href=""><i class="btn btn-default"> Checkout</i></a>--}}
                        {{--</li>--}}

                        <a class="btn btn-default check_out" href="">Check Out</a>


                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection