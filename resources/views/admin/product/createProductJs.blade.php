<script type="text/javascript">
    jQuery(function($){

    // $("#chosen-tags").chosen({
    //         no_results_text: "No Data Found"
    // });


        $('#manufacture-box').on('click','.btnAddManufacture',function(e){
            e.preventDefault();
            $('#myModal_manufacture').modal('show');
            $('#myModal_manufacture').find('.modal-title').text('Add New Manufacture');
            $('#myForm_manufacture').attr('action','{{ url('/manufactureAddAjax') }}');
        });

        $('#btnSaveManufacture').click(function(e) {
            e.preventDefault();
            var url = $('#myForm_manufacture').attr('action');
            var data = $('#myForm_manufacture').serialize();
            var manufactureName = $('input[name=manufactureName]');
            var manufactureNameVal = manufactureName.val();
            var manufactureDesc = $('textarea[name=manufactureDescription]');
            var manufactureDescVal = manufactureDesc.val();
            var result = "";
            
            if(manufactureNameVal=="")
            {
                manufactureName.parent().parent().addClass('has-error');
                $('#manufacture_null').html('Manufacture Can not be Null').fadeIn();
            }
            else
            {
                manufactureName.parent().parent().removeClass('has-error');
                $('#manufacture_null').html('Manufacture Can not be Null').fadeOut();
                result += '1';
            }

            if(manufactureDescVal=="")
            {
                manufactureDesc.parent().parent().addClass('has-error');
                $('#desc_null').html('Description Can not be Null').fadeIn();
            }
            else
            {
                manufactureDesc.parent().parent().removeClass('has-error');
                $('#desc_null').html('Description Can not be Null').fadeOut();
                result += '1';
            }

            if(result == '11')
            {
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                })
                .done(function(response) {
                    if(response.success)
                    {                
                        var lastId = response.last_id; 
                        //showNotifyJs(response.msg,response.type);
                        $('#myModal_manufacture').modal('hide');
                        $('#myForm_manufacture')[0].reset;
                        var manufacture_str = '<div class="form-group col-lg-12">'+
                                            '<div class="radio">'+
                                                '<label><input class="check_box" type="radio" value="'+lastId+'" name="productManufacturers">'+manufactureNameVal+'</label>'+
                                            '</div>'+
                                        '</div>';

                        $('#new_manufacture_add').append(manufacture_str);
                    }
                })
                .fail(function() {
                    //showNotifyJs(response.msg,response.type);
                    $('#myForm_manufacture').modal('hide');
                })
                .always(function() {
                    console.log("complete");
                });
                
                
            }

        });



        $('#category-box').on('click','.btnAddCategory',function(e){
            e.preventDefault();
            $('#myModal_category').modal('show');
            $('#myModal_category').find('.modal-title').text('Add New Category');
            $('#myForm_category').attr('action','{{ url('/categoryAddAjax') }}');
        });

        $('#btnSaveCategory').click(function(e) {
            e.preventDefault();
            var url = $('#myForm_category').attr('action');
            var data = $('#myForm_category').serialize();
            var categoryName = $('input[name=categoryName]');
            var categoryNameVal = categoryName.val();
            var categoryDesc = $('textarea[name=categoryDescription]');
            var categoryDescVal = categoryDesc.val();
            var result = "";
            
            if(categoryNameVal=="")
            {
                categoryName.parent().parent().addClass('has-error');
                $('#category_null').html('Category Can not be Null').fadeIn();
            }
            else
            {
                categoryName.parent().parent().removeClass('has-error');
                $('#category_null').html('Category Can not be Null').fadeOut();
                result += '1';
            }

            if(categoryDescVal=="")
            {
                categoryDesc.parent().parent().addClass('has-error');
                $('#desc_null').html('Description Can not be Null').fadeIn();
            }
            else
            {
                categoryDesc.parent().parent().removeClass('has-error');
                $('#desc_null').html('Description Can not be Null').fadeOut();
                result += '1';
            }

            if(result == '11')
            {

                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                })
                .done(function(response) {
                    if(response.success)
                    {
                        var lastId = response.last_id;
                        //showNotifyJs(response.msg,response.type);
                        $('#myModal_category').modal('hide');
                        $('#myForm_category')[0].reset;
                        var category_str = '<div class="form-group col-lg-12">'+
                                            '<div class="checkbox">'+
                                                '<label><input class="check_box" type="checkbox" name="productCategory[]"  value="'+lastId+'">'+categoryNameVal+'</label>'+
                                            '</div>'+
                                        '</div>';
                        $('#new_category_add').append(category_str);
                    }
                })
                .fail(function() {
                    //showNotifyJs(response.msg,response.type);
                    $('#myModal_category').modal('hide');
                })
                .always(function() {
                    console.log("complete");
                });
                
                
            }

        });



        $('body').on('click','.remove_varient',function(){
            $(this).closest('.add_varient').remove();
        });

        $('body').on('click','.plus_varient',function(){

            var varient =   '<div class="form-group add_varient">'+

                                '<div class="col-xs-3 text-center">'+

                                    '<select class="form-control" id="var_size" name="var_size[]">'+
                                        '<option value="">Select Size</option>'+
                                        '@foreach($sizes as $size)'+
                                            '<option value="{{ $size->sizeId }}">{{ $size->sizeName }}</option>'+
                                        '@endforeach'+
                                    '</select>'+
                                    
                                '</div>'+

                                
                                '<div class="col-lg-2 text-center">'+
                                    '<select class="form-control" id="var_color" name="var_color[]">'+
                                        '<option value="">Select Color</option>'+
                                        '@foreach($colors as $color)'+
                                            '<option value="{{ $color->colorId }}">{{ $color->colorName }}</option>'+
                                        '@endforeach'+
                                    '</select>'+
                                '</div>'+


                                '<div class="col-xs-2 text-center">'+
                                  '<input class="form-control var_qty" id="var_qty" name="var_qty[]" type="number" >'+
                                '</div>'+

                                '<div class="col-xs-2 text-center">'+
                                  '<input class="form-control" id="var_price" name="var_extraPrice[]" type="number">'+
                                '</div>'+


                                '<div class="col-xs-1">'+
                                    '<button  type="button" class="btn btn-danger remove_varient"><i class="fa fa-remove" aria-hidden="true"></i></button>'+
                                '</div> '+

                                '<div class="col-xs-1">'+
                                    '<button  type="button" class="btn btn-danger plus_varient"><i class="fa fa-plus" aria-hidden="true"></i></button>'+
                                '</div>'+ 
                            '</div>';

            $('.varient').append(varient);

        });





    });
</script>