@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Add Product</a>
        </li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
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
                <form class="form-horizontal" action="{{url('save-product')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="product_name">Name</label>
                            <div class="controls">
                                <input type="text" name="product_name" class="input-xlarge" id="product_name" value="" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Category</label>
                            <div class="controls">
                                <select id="selectError3" name="category_id">
                                    <option value="">Select Category</option>
                                    <?php
                                    $all_published_category = DB::table('tbl_category')
                                        ->where('category_status', 1)
                                        ->get();
                                    ?>
                                    @foreach($all_published_category as $category)
                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Brand</label>
                            <div class="controls">
                                <select id="selectError3" name="brand_id">
                                    <option value="">Select Brand</option>
                                    <?php
                                    $all_published_brand = DB::table('tbl_brand')
                                        ->where('brand_status', 1)
                                        ->get();
                                    ?>
                                    @foreach($all_published_brand as $brand)
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{--<div class="control-group">--}}
                            {{--<label class="control-label" for="date01">Publish Date</label>--}}
                            {{--<div class="controls">--}}
                                {{--<input type="text" class="input-xlarge datepicker" id="date01" value="02/16/12">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Short Description</label>
                            <div class="controls">
                                <textarea name="product_short_description" class="cleditor" id="textarea2" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Long Description</label>
                            <div class="controls">
                                <textarea name="product_long_description" class="cleditor" id="textarea2" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="product_name">Price</label>
                            <div class="controls">
                                <input type="text" name="product_price" class="input-xlarge" id="product_price" value="" required>
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
                                <input type="text" name="product_size" class="input-xlarge" id="product_size" value="" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="product_name">Color</label>
                            <div class="controls">
                                <input type="text" name="product_color" class="input-xlarge" id="product_color" value="" required>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Status</label>
                            <div class="checker">
                                <span>
                                    <input type="checkbox" name="product_status" value=1>
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
@endsection