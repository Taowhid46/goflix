@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-md-12">
      <a href="{{ url('/category/add') }}"><button class="btn btn-sm btn-danger pull-right">Add New Category</button></a>
    </div>
</div>


<div class="row">
    <h3 class="text-center success_msg" style="color: #04004e;"></h3>
    <?php 
        if(Session::get('message'))
        {
    ?>
        <script type="text/javascript">
            jQuery(function($){
                $('.success_msg').html('<?php echo Session::get('message') ?>').fadeIn().delay(2000).fadeOut('slow');
            });
        </script>

    <?php } ?>
    <br>
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Manage Category
            </header>
            <div class="panel-body panel_short">
                <div class="table-responsive text-center">
                    <table class="table rable-hover table-bordered">
                        <thead>
                            <tr style="background: #513d65;">
                                <td>Serial</td>
                                <td>Category Name</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl=1; ?>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $category->categoryName }}</td>
                                <td>{{ $category->status == '1' ? 'Published' : 'Unpublish' }}</td>
                                <td>
                                    <a href="{{ url('/category/editCategory/'.$category->id)  }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('/category/deleteCategory/'.$category->id)  }}" onclick="return confirm('Are You Sure !');">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
</div>
@endsection