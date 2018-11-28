   //AJAX Wilayah city
   $(document).ready(function() {

    $('select[name="province"]').on('change', function(){
        var selectId = $(this).val();
        if(selectId) {
            $.ajax({
                url: '/city/'+selectId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="city"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="city"]').append('<option value="'+ value +'">' + key + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="city"]').empty();
        }

    });

    });

    $(document).ready(function() {

    $('select[name="city"]').on('change', function(){
        var selectId = $(this).val();
        if(selectId) {
            $.ajax({
                url: '/district/'+selectId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader2').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="district"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="district"]').append('<option value="'+ value +'">' + key + '</option>');

                    });
                },
                complete: function(){
                    $('#loader2').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="district"]').empty();
        }

    });

    });

     $(document).ready(function() {

$('select[name="district"]').on('change', function(){
    var selectId = $(this).val();
    if(selectId) {
        $.ajax({
            url: '/village/'+selectId,
            type:"GET",
            dataType:"json",
            beforeSend: function(){
                $('#loader2').css("visibility", "visible");
            },

            success:function(data) {

                $('select[name="village"]').empty();

                $.each(data, function(key, value){

                    $('select[name="village"]').append('<option value="'+ value +'">' + key + '</option>');

                });
            },
            complete: function(){
                $('#loader2').css("visibility", "hidden");
            }
        });
    } else {
        $('select[name="village"]').empty();
    }

});

});

$('#submit').on('click', function(){
    var province = $('#province').find(":selected").text();
    $('#province').find(":selected").val(province);
    var city = $('#city').find(":selected").text();
    $('#city').find(":selected").val(city);
    var district = $('#district').find(":selected").text();
    $('#district').find(":selected").val(district);
    var village = $('#village').find(":selected").text();
    $('#village').find(":selected").val(village);
});