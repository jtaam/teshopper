<?php $__env->startSection('admin_content'); ?>
    <!-- start: Content -->
    <div id="content" class="span10">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Sliders</a></li>
        </ul>
        <?php
        $message = Session::get('message');
        if ($message) {
            echo $message;
            Session::put('message', null);
        }
        ?>

        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $all_slider_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($v_slider->slider_id); ?></td>
                                <td class="center"><?php echo e($v_slider->slider_title); ?></td>
                                <td class="center"><?php echo e($v_slider->slider_subtitle); ?></td>
                                <td class="center"><img src="<?php echo e(URL::to($v_slider->slider_image)); ?>" alt="<?php echo e($v_slider->slider_title); ?>"></td>                                
                                <td class="center">
                                    <?php if(0 == $v_slider->slider_status): ?>
                                        <span class="label label-warning">Pending</span>
                                    <?php else: ?>
                                        <span class="label label-success">Published</span>
                                    <?php endif; ?>
                                </td>
                                <td class="center">
                                    <?php if(0 == $v_slider->slider_status): ?>
                                        <a class="btn btn-success"
                                           href="<?php echo e(URL::to('/publish-slider/'.$v_slider->slider_id)); ?>">
                                            <i class="halflings-icon white thumbs-up"></i>
                                        </a>
                                    <?php else: ?>
                                        <a class="btn btn-danger"
                                           href="<?php echo e(URL::to('/unpublish-slider/'.$v_slider->slider_id)); ?>">
                                            <i class="halflings-icon white thumbs-down"></i>
                                        </a>
                                    <?php endif; ?>
                                    <a class="btn btn-info"
                                       href="<?php echo e(URL::to('/edit-slider/'.$v_slider->slider_id)); ?>">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                    <a class="btn btn-secondary"
                                       href="<?php echo e(URL::to('/delete-slider/'.$v_slider->slider_id)); ?>" id="delete">
                                        <i class="halflings-icon white trash"></i>

                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div><!--/span-->

        </div><!--/row-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>