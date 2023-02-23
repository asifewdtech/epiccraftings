<script>
    let rushOrder = {{Config::get('app.rush_order')}}
    let normalOrder = {{Config::get('app.normal_order')}}

    function getDeliveryDate(days) {
        if($('#rushOrder').is(":checked")){
            if($('#rushOrder').val()=="1"){$('#rushOrderCheck').val(true)}
        }else{
            $('#rushOrderCheck').val(false);
        }

        let deliverDate = new Date();
        deliverDate.setDate(deliverDate.getDate() + days);
        $('.deliveryDate').html(deliverDate.getDate() + "-" + (deliverDate.getMonth() + 1) + "-" + deliverDate.getFullYear() + " (or earlier);");
    }

    $(window).on('load', function() {
        $('#rushOrderCheck').val()?getDeliveryDate(rushOrder):getDeliveryDate(normalOrder);
    });

</script>