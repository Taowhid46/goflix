jQuery(function($){


                
    $(".class_payment").on("click",function(){

        var dis=$(this);
        if(dis.val()=="bkash"){
            $(".bkash-val").fadeIn();
        }else{
            $(".bkash-val").fadeOut();
        }
    });

    $('#registerForm').on('click','#customerRegister',function(e){
        e.preventDefault();

        var flag;
        var uri = $('#registerForm').attr('action');
        var email = $('#registerForm').find('.registerEmail').val();
        var password = $('#registerForm').find('.registerPass').val();
        var confirmPassword = $('#registerForm').find('.registerConfirmPass').val();

        var data = $('#registerForm').serialize();

        if(!email){
            $('#registerForm').find('.emailNull').html('Email Must be fill Up !').fadeIn().delay(2000).fadeOut('slow');
            var flag = 1;
        }
        else if(!password){
            $('#registerForm').find('.passNull').html('Password Must be fill Up !').fadeIn().delay(2000).fadeOut('slow');
            var flag = 1;
        }
        else if(!confirmPassword){
            $('#registerForm').find('.confPassNull').html('Confirm Password Must be fill Up !').fadeIn().delay(2000).fadeOut('slow');
            var flag = 1;
        }
        else if(confirmPassword != password){
            $('#registerForm').find('.confPassNull').html('Confirm Password Must be Same !').fadeIn().delay(2000).fadeOut('slow');
            var flag = 1;
        }

        if(flag != 1)
        {
            $.ajax({
                url: uri,
                type: 'POST',
                dataType: 'json',
                data: data,
            })
            .done(function(response) {

                if(response == 'error')
                {
                    $('.registerSuccess').html('Email Already Exists !').fadeIn().delay(3000).fadeOut('slow');
                }
                if(response == 'success')
                {
                    $('.registerSuccess').html('Check Your Email And Active Your Account !').fadeIn().delay(3000).fadeOut('slow');
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        }
        


    });

    $('#loginForm').on('click','#customerLogin',function(e){
        e.preventDefault();
        var flag;
        var uri = $('#loginForm').attr('action');
        var email = $('#loginForm').find('.loginEmail').val();
        var password = $('#loginForm').find('.loginPass').val();

        var data = $('#loginForm').serialize();

        if(!email){
            $('#loginForm').find('.emailNull').html('Email Must be fill Up !').fadeIn().delay(2000).fadeOut('slow');
            var flag = 1;
        }
        else if(!password){
            $('#loginForm').find('.passNull').html('Password Must be fill Up !').fadeIn().delay(2000).fadeOut('slow');
            var flag = 1;
        }

        if(flag != 1)
        {
            $.ajax({
                url: uri,
                type: 'POST',
                dataType: 'json',
                data: data,
            })
            .done(function(response) {

                if(response == 'error')
                {
                    $('.loginSuccess').html('Email Or Password Does Not Match !').fadeIn().delay(2000).fadeOut('slow');
                }
                if(response == 'success')
                {
                    setTimeout(function(){
                        $('#myModal4').modal('hide');
                        var locationUrl = $('.hiddenUrl').val();
                        window.location=locationUrl;
                    }, 3000);
                    
                    $('.loginSuccess').html('Logged In Successfully !').fadeIn().delay(2000).fadeOut('slow');
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        }
        


    });

    //chosen js
    $("#size").chosen({
            no_results_text: "No Data Found"
    });


    //chosen js
    $("#color").chosen({
            no_results_text: "No Data Found"
    });


    $('body').on('change','.quantity',function(){
        var value = $(this).val();
        var price = $('.price').val();
        var updateValue = value*price;
        $('.item_price').html('$'+updateValue);
    });

    

});