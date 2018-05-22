<?php $__env->startSection('admin_content'); ?>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Update Product</a>
        </li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Product</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <?php
//                $message = Session::get('message');
//                if ($message){
//                    echo $message;
//                    Session::put('message', null);
//                }
            ?>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo e(url('update-product', $the_product_info->product_id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="product_name">Name</label>
                            <div class="controls">
                                <input type="text" value="<?php echo e($the_product_info->product_name); ?>" name="product_name" class="input-xlarge" id="product_name" value="" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Category</label>
                            <div class="controls">
                                <select id="selectError3" name="category_id">
                                    <option value="<?php echo e($the_product_info->category_id); ?>"><?php echo e($the_product_info->category_name); ?></option>
                                    <?php
                                    $all_published_category = DB::table('tbl_category')
                                        ->where('category_status', 1)
                                        ->get();
                                    ?>
                                    <?php $__currentLoopData = $all_published_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->category_id); ?>"><?php echo e($category->category_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Brand</label>
                            <div class="controls">
                                <select id="selectError3" name="brand_id">
                                    <option value="<?php echo e($the_product_info->brand_id); ?>"><?php echo e($the_product_info->brand_name); ?></option>
                                    <?php
                                    $all_published_brand = DB::table('tbl_brand')
                                        ->where('brand_status', 1)
                                        ->get();
                                    ?>
                                    <?php $__currentLoopData = $all_published_brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($brand->brand_id); ?>"><?php echo e($brand->brand_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Short Description</label>
                            <div class="controls">
                                <textarea name="product_short_description" class="cleditor" id="textarea2" rows="3"><?php echo e($the_product_info->product_short_description); ?></textarea>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Long Description</label>
                            <div class="controls">
                                <textarea name="product_long_description" class="cleditor" id="textarea2" rows="3"><?php echo e($the_product_info->product_long_description); ?></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="product_name">Price</label>
                            <div class="controls">
                                <input type="text" name="product_price" class="input-xlarge" id="product_price" value="<?php echo e($the_product_info->product_price); ?>" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <img src="<?php echo e(URL::to($the_product_info->product_image)); ?>" alt="">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Image</label>
                            <div class="controls">
                                <input name="product_image" class="input-file uniform_on" id="fileInput" type="file">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="product_name">Size</label>
                            <div class="controls">
                                <input type="text" name="product_size" class="input-xlarge" id="product_size" value="<?php echo e($the_product_info->product_size); ?>" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="product_name">Color</label>
                            <div class="controls">
                                <input type="text" name="product_color" class="input-xlarge" id="product_color" value="<?php echo e($the_product_info->product_color); ?>" required>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Status</label>
                            <div class="checker">
                                <span>
                                    <?php if(1 == $the_product_info->product_status): ?>
                                        <input type="checkbox" name="product_status" value=1 checked>
                                        <?php else: ?>
                                        <input type="checkbox" name="product_status" value=0>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>