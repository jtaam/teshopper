<?php $__env->startSection('admin_content'); ?>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Add Slider</a>
        </li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <?php
            $message = Session::get('message');
            if ($message){
                echo $message;
                Session::put('message', null);
            }
            ?>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo e(url('save-slider')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="product_name">Title</label>
                            <div class="controls">
                                <input type="text" name="slider_title" class="input-xlarge" id="slider_title" value="" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="product_name">Subtitle</label>
                            <div class="controls">
                                <input type="text" name="slider_subtitle" class="input-xlarge" id="slider_subtitle" value="" required>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Description</label>
                            <div class="controls">
                                <textarea name="slider_description" class="cleditor" id="textarea2" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Image</label>
                            <div class="controls">
                                <input name="slider_image" class="input-file uniform_on" id="fileInput" type="file">
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Status</label>
                            <div class="checker">
                                <span>
                                    <input type="checkbox" name="slider_status" value=1>
                                </span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>