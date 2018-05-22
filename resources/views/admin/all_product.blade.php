@extends('admin_layout')
@section('admin_content')
    <!-- start: Content -->
    <div id="content" class="span10">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Products</a></li>
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
                            <th>Name</th>

                            <th>Image</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        @foreach( $all_product_info as $v_product)
                            <tbody>
                            <tr>
                                <td>{{ $v_product->product_id }}</td>
                                <td class="center">{{ $v_product->product_name }}</td>

                                <td><img src="{{URL::to($v_product->product_image)}}"
                                         style="height: 80px; width: 80px;"></td>
                                <td class="center">{{ $v_product->product_price }} Tk</td>
                                <td class="center">{{ $v_product->category_name }}</td>
                                <td class="center">{{ $v_product->brand_name }}</td>
                                <td class="center">
                                    @if($v_product->product_status==1)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">Unactive</span>
                                    @endif
                                </td>

                                <td class="center">
                                    @if($v_product->product_status==1)
                                        <a class="btn btn-warning"
                                           href="{{URL::to('/unpublish_product/'.$v_product->product_id)}}">
                                            <i class="halflings-icon white thumbs-down"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-success"
                                           href="{{URL::to('/publish_product/'.$v_product->product_id)}}">
                                            <i class="halflings-icon white thumbs-up"></i>
                                        </a>
                                    @endif

                                    <a class="btn btn-info" href="{{URL::to('/edit_product/'.$v_product->product_id)}}">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                    <a class="btn btn-danger"
                                       href="{{URL::to('/delete_product/'.$v_product->product_id)}}" id="delete">
                                        <i class="halflings-icon white trash"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div><!--/span-->
        </div><!--/row-->
@endsection