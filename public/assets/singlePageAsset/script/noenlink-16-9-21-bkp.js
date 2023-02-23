function createOrder() {
    var copyText = document.getElementById("copy_content");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    // alert('Congratulations on finalizing the design. You are now being redirected to our sales page on ETSY. The customization details of your neon sign have been copied, just paste them to personalization field  when placing order on ETSY sales page.')
    // $('.main-loader').removeClass('d-none');
    // $('#sectionOpacity').addClass('opacity-section')
    html2canvas(document.getElementById('copyimage'), {
        allowTaint: true,
    }).then(function (canvas) {

        // document.body.appendChild(canvas);

        // Get base64URL
        // var base64URL = canvas.toDataURL('image/jpeg').replace('image/jpeg', 'image/octet-stream');
        var base64URL = canvas.toDataURL('image/png');
        var colors = $('.text-one-color-name').text().replace(',', '')+','+ $('.text-two-color-name').text().replace(',', '')+','+ $('.text-three-color-name').text().replace(',', '');
        colors = colors.replace(/,\s*$/, "");
        var fonts = $('.text-one-font-name').text().replace(';', '') + $('.text-two-font-name').text().replace(';', '') + $('.text-three-font-name').text().replace(';', '');
        fonts=fonts.replace(/,\s*$/, "");
        $.ajax({
            type: 'POST',
            url: "custom-add-to-cart",
            data: {
                _token: $('#csrf_token').val(),
                line_one_text: $('#lineonefinaltext').text().replace(',', ''),
                line_two_text: $('#linetwofinaltext').text().replace(',', ''),
                line_three_text: $('#linethreefineltext').text().replace(',', ''),
                backing_color: $('.backing-color-text').text().replace(' ', '').replace(/,\s*$/, ""),
                backing_shape: $('.backing-shape-text').text().replace(' ', '').replace(/,\s*$/, ""),
                size: $('.size').text().replace(';', ''),
                deliver_date: $('.deiverDate').text().replace(';', ''),
                price: $('.finalPrice').text().replace(';', ''),
                install: $('.install-text').text().replace(';', '').replace(/,\s*$/, ""),
                font: fonts,
                colors: colors,
                image: base64URL,
                width:$('#textWidth').text(),
                height:$('#textHeight').text()
            },
            success: function (data) {
                if (data.success == true) {
                    Swal.fire(
                        'Success!',
                        data.message,
                        'success'
                    ).then((value) => {
                       window.location='checkout';
                    });
                } else {
                    Swal.fire(
                        'Warning!',
                        data.message,
                        'warning'
                    ).then((value) => {
                       window.location='';
                    });
                }
            }
        })
    });

}


function copy(){
    $('#copy_content').val($('#copyText').text().replace(/\s/g, "").replace(/\;/g, "\n"));
    $('#modal-content-text').val($('#copy_content').val())
}


// Color Tubes code start
let colorTubes = document.querySelectorAll('.color-selection');
colorTubes.forEach(singleTube => {
        singleTube.classList.add('fa')
        singleTube.classList.add('fa-lightbulb-o')
        singleTube.setAttribute('aria-hidden', 'true')
    })
    // Color Tubes code end

