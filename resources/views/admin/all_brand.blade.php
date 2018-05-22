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
            <li><a href="#">Brands</a></li>
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
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $all_brand_info as $v_brand)
                            <tr>
                                <td>{{$v_brand->brand_id}}</td>
                                <td class="center">{{$v_brand->brand_name}}</td>
                                <td class="center">{{$v_brand->brand_description}}</td>
                                <td class="center">
                                    @if(0 == $v_brand->brand_status)
                                        <span class="label label-warning">Pending</span>
                                    @else( 1 == $v_brand->brand_status)
                                        <span class="label label-success">Published</span>
                                    @endif
                                </td>
                                <td class="center">
                                    @if(0 == $v_brand->brand_status)
                                        <a class="btn btn-success"
                                           href="{{URL::to('/publish_brand/'.$v_brand->brand_id)}}">
                                            <i class="halflings-icon white thumbs-up"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-danger"
                                           href="{{URL::to('/unpublish_brand/'.$v_brand->brand_id)}}">
                                            <i class="halflings-icon white thumbs-down"></i>
                                        </a>
                                    @endif
                                    <a class="btn btn-info"
                                       href="{{URL::to('/edit_brand/'.$v_brand->brand_id)}}">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                    <a class="btn btn-secondary"
                                       href="{{URL::to('/delete_brand/'.$v_brand->brand_id)}}" id="delete">
                                        <i class="halflings-icon white trash"></i>

                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--/span-->

        </div><!--/row-->
@endsection