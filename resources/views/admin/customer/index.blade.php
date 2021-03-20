@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-md-12">
      <a href="{{ url('/adminCustomer/create') }}"><button class="btn btn-sm btn-danger pull-right">Add New Customer</button></a>
    </div>
</div>


<div class="row">

    <div class="col-lg-12">
        @if(session('success_msg'))
            <div class="alert alert-success status_msg"></div>
            
            <script type="text/javascript">
                jQuery(function($){
                    $('.status_msg').html('<?php echo Session::get('success_msg'); ?>').fadeIn().delay(2000).fadeOut('slow');
                });
            </script>
        @endif
        <br>
        <section class="panel">
            <header class="panel-heading">
                Manage Customers
            </header>
            <div class="panel-body panel_short">
                <div class="table-responsive text-center">
                    <table class="table rable-hover table-bordered">
                        <thead>
                            <tr style="background: #513d65;">
                                <td>Serial</td>
                                <td>Customer Name</td>
                                <td>Email</td>
                                <td>Address</td>
                                <td>Number</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl=1; ?>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->number }}</td>
                                <td>
                                <form action="{{ url('/adminCustomer/status') }}" method="POST">
                                    {{csrf_field()}}
                                    <input type="hidden" name="customer_id" value="{{ $data->id }}">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $data->status == '1' ? 'selected' : '' }} >Active</option>
                                        <option value="0" {{ $data->status == '0' ? 'selected' : '' }} >De-active</option>
                                    </select>
                                    <br>
                                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                                </form>
                                </td>
                                <td>
                                    <a href="{{ url('/adminCustomer/deleteCustomer/'.$data->id)  }}" onclick="return confirm('Are You Sure !');">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $datas->links() }}
                </div>
            </div>

        </section>
    </div>
</div>
@endsection