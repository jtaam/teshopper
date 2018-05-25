<?php $__env->startSection('content'); ?>
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
                    <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="<?php echo e(URL::to($v_content->options->image)); ?>" height="80px" width="80px"
                                                alt="<?php echo e($v_content->name); ?>"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href=""><?php echo e($v_content->name); ?></a></h4>

                            </td>
                            <td class="cart_price">
                                <p>$<?php echo e($v_content->price); ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <form action="" method="post">

                                        <input class="cart_quantity_input" type="text" name="qty"
                                               value="<?php echo e($v_content->qty); ?>" autocomplete="off" size="2">
                                        <input type="hidden" name="rowId" value="">
                                        <input type="submit" name="submit" value="update"
                                               class="btn btn-sm btn-default">
                                    </form>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$<?php echo e($v_content->total()); ?></p>
                            </td>
                            <td class="cart_delete">

                                <a class="cart_quantity_delete" href="<?php echo e(URL::to('/delete-cart/'.$v_content->rowId)); ?>"><i
                                            class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                            <li>Cart Sub Total <span><?php echo e($v_content->subtotal()); ?></span></li>
                            <li>Eco Tax <span><?php echo e($v_content->tax()); ?></span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span><?php echo e($v_content->total); ?></span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a><br>

                        <li><a href=""><i class="btn btn-default"> Checkout</i></a>
                        </li>

                        <li><a class="btn btn-default check_out" href="">Check Out</a></li>


                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>