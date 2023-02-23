var backingColor = "Clear Acrylic";
var backingShape = "Text Shape";
var noenText = ".noenText1";
var lineTab = "#lineTab";
var defaultFontSize = [];
$(document).ready(function() {
    defaultFontSize = checkFontSize($('.noenText1'), $('.noenText2'), $('.noenText3'));
    setFont('WildScript', 2, ".WildScript");
    selectLineColumn(lineTab + " li:first-child");
    getDeliverDate(21)
    $('.font-btn').click(function() {
        var font = $(this).attr('class').split(' ').pop();
        setFont(font, 2, this);

    });
    $('.color-selection').click(function() {
        var color = $(this).css('background-color');

        $(noenText).css('color', color);

    });
    var timestamp = new Date().getTime().toString().substr(-6);
    var timestamp = timestamp.valueOf();
    $('.unique_id').html(timestamp + ";")
        // if (location.protocol !== "https:" || location.protocol === "www") {
        //     location.protocol = "https:";
        // }
        /************* Choose backing color*************/
    $("#backingColorOption li a").click(function() {
        if (!$(this).hasClass("bg-F34EFF")) {
            $(this).addClass("bg-F34EFF")
            $($(this).parent().siblings().children()).removeClass("bg-F34EFF")
        }

        /************* clear backing*************/
        if ($(this).attr("id") == "clearBackingColor") {
            backingColor = "Clear Acrylic";
        }

        /************* white backing*************/
        if ($(this).attr("id") == "whiteBackingColor") {
            backingColor = "White";
        }

        /************* black backing*************/
        if ($(this).attr("id") == "blackBackingColor") {
            backingColor = "Black";
        }

    });
    /************* Choose Backing Shapes*************/
    $("#backingShapeOption li a").click(function() {
        if (!$(this).hasClass("bg-F34EFF")) {
            $(this).addClass("bg-F34EFF")
            $($(this).parent().siblings().children()).removeClass("bg-F34EFF")
        }

        /************* clear backing*************/
        if ($(this).attr("id") == "clearBackingColor") {
            backingColor = "Clear Acrylic";
        }

        /************* white backing*************/
        if ($(this).attr("id") == "whiteBackingColor") {
            backingColor = "White";
        }

        /************* black backing*************/
        if ($(this).attr("id") == "blackBackingColor") {
            backingColor = "Black";
        }

    });


});

function setFont(font, type, font_li) {
    $('.font-btn').removeClass('activeFont');
    var activeFont = $(font_li).addClass('activeFont');
    $(noenText).css("font-family", font);
    // console.log($(font_li).attr('data-size'));
    // var fontSize = window.innerWidth < 760 ? $(noenText).css("font-size", $(font_li).attr('data-mob') + 'px') : $(noenText).css("font-size", $(font_li).attr('data-desk') + 'px');
    $(noenText).css("font-size", $(font_li).attr('data-desk') + 'px')
    $(noenText).css("line-height", $(font_li).attr('data-lineh'));
    $(noenText).css("font-family", font);
    $(noenText).css("line-height", $(font_li).attr('data-lineh'));
    $(noenText).attr("data-lineh", $(font_li).attr('data-lineh'));
    group = type;
    if (noenText == '.noenText1')
        $(".text-one-font-name").text($(font_li).data('class') + ',');
    if (noenText == '.noenText2')
        $(".text-two-font-name").text($(font_li).data('class') + ',');
    if (noenText == '.noenText3')
        $(".text-three-font-name").text($(font_li).data('class'));
    // $("#finalfont").html($(font_li).data('class'));

}

function getDeliverDate(day) {

    var deliverDate = new Date();
    deliverDate.setDate(deliverDate.getDate() + day);
    $('.deiverDate').html(deliverDate.getMonth() + 1 + "-" + deliverDate.getDate() + "-" + deliverDate.getFullYear() + " (or earlier);");
}

function getFontSize() {

    var currentSize = $(noenText).css("font-size");
    var currentSizeNumber = parseFloat(currentSize, 12);

    return currentSizeNumber;
}

var widthReturn = false;
var fontDataClassHeight = '';


function increaseSize() {
    var fontSize = getFontSize();
    if (fontSize < 240) {

        var newFontSize = fontSize + 8;


        var objFontSize = parseInt($(noenText).attr("data-height"));

        var increment = objFontSize + 1;
        objFontSize = parseInt($(noenText).attr("data-height", increment));
        fontDataClassHeight = $(noenText).attr('data-class');
        // parseInt($('.' + fontDataClassHeight).attr("data-height", increment));

        if ($('li.active').hasClass('one'))
            widthReturn = cost_calcultor($('.noenText1'));
        else if ($('li.active').hasClass('two'))
            widthReturn = cost_calcultor($('.noenText1'), $('.noenText2'));
        else if ($('li.active').hasClass('three'))
            widthReturn = cost_calcultor($('.noenText1'), $('.noenText2'), $('.noenText3'));
        if (widthReturn)
            setFontSize(newFontSize);

    }

}
let ObjMinFontSize = {
    "Alexa": 7,
    "Bayshore": 8,
    "Dancer": 7,
    "Gruenewald": 7,
    "NewCursive": 7,
    "Barcelony": 9,
    "Vintage": 7,
    "Amanda": 9,
    "Budhayan": 10,
    "Sebastian": 10,
    "Signature": 9,
    "Assalwa": 8,
    "Hamilton": 12,
    "Hesterica": 9,
    "LoveNote": 7,
    "Northwell": 10,
    "Quinzey": 8,
    "RedVelvet": 9,
    "Rocket": 7,
    "WildScript": 12,
    "AvantGrade": 5,
    "Bauhaus": 6,
    "DOLCEVITA": 5,
    "KIONA": 5,
    "NixieOne": 5,
    "Typewriter": 5,
    "PaperDaisy": 6,
    "Roboto": 6,
    "BRAVE": 6,
    "LOVELO": 11,
    "Marquee": 11,
    "NeonGlow": 11,
    "NeonLite": 6,
    "NEONTUBE": 8,
    "Outline": 11,
    "SciFi": 18,

};


function decreaseSize() {
    var fontSize = getFontSize();


    var newFontSize = fontSize - 8;
    // $('.price').html((parseFloat($('.price').html()) - 10).toFixed(0))


    var objFontSize = parseInt($(noenText).attr("data-height"));
    var objFontName = $(noenText).attr("data-class");
    var increment = objFontSize - 1;

    if (increment < ObjMinFontSize[objFontName])
        return false;

    fontDataClassHeight = $(noenText).attr('data-class');
    parseInt($('.' + fontDataClassHeight).attr("data-height", increment));
    if ($('li.active').hasClass('one'))
        widthReturn = cost_calcultor($('.noenText1'));
    else
    if ($('li.active').hasClass('two'))
        widthReturn = cost_calcultor($('.noenText1'), $('.noenText2'));
    else if ($('li.active').hasClass('three'))
        widthReturn = cost_calcultor($('.noenText1'), $('.noenText2'), $('.noenText3'));
    if (widthReturn)
        setFontSize(newFontSize);


}

function setFontSize(size) {
    // $('span.' + fontDataClassHeight).css("font-size", size);
    // $('.neon').querySelector(fontDataClassHeight).css("font-size", size);
    $(noenText).css("font-size", size);
}

function getLineHeight() {

    var lineHeight = $(noenText).css("line-height");
    var lineHeightNumber = parseFloat(lineHeight, 12);
    return lineHeightNumber;
}

function increaseLineHeight() {
    var lineHeight = getLineHeight();
    var newLineHeight = lineHeight + 4;
    setLineHeight(newLineHeight);

}

function decreaseLineHeight() {
    var lineHeight = getLineHeight();
    var newLineHeight = lineHeight - 4;
    setLineHeight(newLineHeight);
}

function setLineHeight(lineHeight) {
    $(noenText).css("line-height", lineHeight + "px");
}

function cost_calcultor(nText1, nText2, nText3) {
    var finalHeight = nText1 != null && nText2 == null && nText3 == null ? (parseInt(nText1.attr("data-height"))) : nText1 != null && nText2 != null && nText3 == null ? ((parseInt(nText1.attr("data-height"))) + (parseInt(nText2.attr("data-height")))) : ((parseInt(nText1.attr("data-height"))) + (parseInt(nText2.attr("data-height"))) + (parseInt(nText3.attr("data-height"))));
    // var noOfLines = nText1 != null && nText2 == null && nText3 == null ? 1 : nText1 != null && nText2 != null && nText3 == null ? 2 : 3;
    if (nText2 != null)
        var textOBJ = get_obj_width(nText1) > get_obj_width(nText2) && nText3 == null ? nText1 : (nText3 != null && (get_obj_width(nText3) > get_obj_width(nText2)) && (get_obj_width(nText3) > get_obj_width(nText1))) ? nText3 : (nText3 != null && (get_obj_width(nText1) > get_obj_width(nText2)) && (get_obj_width(nText1) > get_obj_width(nText3))) ? nText1 : nText2;
    else
        var textOBJ = nText1;
    finalHeight += get_height(textOBJ);
    finalWidth = get_obj_width(textOBJ);
    if (finalWidth > 72)
        return false;
    sq = Math.sqrt(finalWidth * (finalHeight));
    if (textOBJ.attr('data-class') == 'SciFi' || textOBJ.attr('data-class') == 'Nevada' || textOBJ.attr('data-class') == 'LoveNeon' || textOBJ.attr('data-class') == 'Marquee' || textOBJ.attr('data-class') == 'NeonGlow' || textOBJ.attr('data-class') == 'Mayfair')
        manufacture_cost = sq * 4.75 * 2;
    else
        manufacture_cost = sq * 4.75 * 1
    conversion = (2.54 * 2.54 * 2.54) / 5000;
    shipping_cost = (((finalWidth + 2) * ((finalHeight) + 2) * 4) * conversion) * 9.49 + 16.3;
    total_cost = (shipping_cost + manufacture_cost) * 2;
    total_cost = total_cost.toFixed(0);
    var changeToTen = total_cost.toString().charAt(total_cost.toString().length - 1);
    total_cost = parseInt(changeToTen) >= 5 ? parseInt(total_cost) + parseInt(10 - parseInt(changeToTen)) : parseInt(total_cost) - parseInt(changeToTen);
    $('.price').html(total_cost < 140 ? 140 : total_cost);
    $('.size').html(Math.round(finalWidth) + "x" + Math.round(finalHeight) + "inches(" + (Math.round(finalWidth) * 2.54).toFixed(0) + "x" + (Math.round(finalHeight) * 2.54).toFixed(0) + "cm);")
    return true;
}

function get_height(inputOBJ) {

    fontHeight = parseInt(inputOBJ.attr("data-height"));
    noOfLines = (inputOBJ.html().match(/<br>/g) || []).length > 0 ? (inputOBJ.html().match(/<br>/g) || []).length : 0;
    return (fontHeight * noOfLines);
}

function get_obj_width(textOBJ) {
    noOfLines = 1;
    var textBreak = textOBJ.html().split('<br>')
    var textMax = '';
    for (var i = 0; i < textBreak.length; i++) {
        if (i == 0)
            textMax = textBreak[i].length;
        if (textMax < textBreak[i].length)
            textMax = textBreak[i].length;
    }
    nChar = textMax;
    aspectRatio = parseFloat(textOBJ.attr('data-aspect_ratio'));
    noOfLines = (textOBJ.html().match(/<br>/g) || []).length > 0 ? (textOBJ.html().match(/<br>/g) || []).length + noOfLines : noOfLines + 0;

    if (noOfLines > 1)
        height = (parseInt(textOBJ.attr("data-height"))) * noOfLines;
    else
        height = parseInt(textOBJ.attr("data-height"));
    finalWidth = ((height / noOfLines) / aspectRatio) * nChar;
    return finalWidth;
}



function selectLineColumn(obj) {

    $(lineTab + " li").removeClass('bg-F34EFF active');
    $(obj).addClass('bg-F34EFF active');
    var getId = $(obj).children("a").attr('id');
    var no_ch, height, aspect_ratio, width, sq, manufacture_cost, conversion, shipping_cost, total_cost;
    if (getId == "three-line-tab") {
        centerAlignEle(noenText);
        noenText2 = '.noenText2';
        centerAlignEle(noenText2);
        noenText3 = '.noenText3';
        centerAlignEle(noenText3);
        $(".text-two-color-name").html($('#noenText2').data('color_name') + ',');
        $(".text-two-font-name").html($('#noenText2').data('class') + ',');
        $(".text-three-color-name").html($('#noenText3').data('color_name') + ',');
        $(".text-three-font-name").html($('#noenText3').data('class') + ',');

        $(noenText).html($("#three_text_1").val().replace(/\r\n|\r|\n/g, '<br>')).css('font-size', parseInt($(noenText).attr('data-size')) + "px");
        $(noenText2).html($("#three_text_2").val().replace(/\r\n|\r|\n/g, '<br>')).css('font-size', parseInt($(noenText2).attr('data-size')) + "px");
        $(noenText3).html($("#three_text_3").val().replace(/\r\n|\r|\n/g, '<br>')).css('font-size', parseInt($(noenText3).attr('data-size')) + "px");
        $(noenText + "," + noenText2 + "," + noenText3).show();
        $("#lineonefinaltext").html($("#three_text_1").val()).show();
        $("#linetwofinaltext").html("," + $("#three_text_2").val()).show();
        $("#linethreefineltext").html("," + $("#three_text_3").val()).show();
        cost_calcultor($(noenText), $(noenText2), $(noenText3));

    } else
    if (getId == "two-line-tab") {
        centerAlignEle(noenText);
        noenText2 = '.noenText2'
        centerAlignEle(noenText2);
        $(noenText3).hide();
        $(".text-two-color-name").html($('#noenText2').data('color_name') + ',');
        $(".text-two-font-name").html($('#noenText2').data('class') + ',');
        $(noenText).html($("#two_text_1").val().replace(/\r\n|\r|\n/g, '<br>')).css('font-size', parseInt($(noenText).attr('data-size')) + "px");
        $(noenText2).html($("#two_text_2").val().replace(/\r\n|\r|\n/g, '<br>')).css('font-size', parseInt($(noenText2).attr('data-size')) + "px");
        $(noenText + "," + noenText2).show();
        $("#lineonefinaltext").html($("#two_text_1").val()).show();
        $("#linetwofinaltext").html("," + $("#two_text_2").val()).show();
        $("#linethreefineltext").html('');
        cost_calcultor($(noenText), $(noenText2));



    } else {
        noenText2 = '.noenText2';
        noenText3 = '.noenText3';
        $(noenText2 + "," + noenText3).hide();
        $(noenText).show();
        centerAlignEle(noenText);
        $(noenText).html($("#one_text_1").val().replace(/\r\n|\r|\n/g, '<br>')).css('font-size', parseInt($(noenText).attr('data-size')) + "px");
        $("#lineonefinaltext").html($("#one_text_1").val()).show();
        $("#linetwofinaltext").html('');
        $("#linethreefineltext").html('');
        cost_calcultor($(noenText));

    }

}

function refresh() {
    location.reload();
}

function updateText(obj) {
    var getId = $(obj).attr('id');
    noenText = '.noenText1'
    noenText2 = '.noenText2'
    noenText3 = '.noenText3'
    if (getId == "one_text_1") {
        $(noenText).html($(obj).val().replace(/\r\n|\r|\n/g, '<br>'));
        $("#lineonefinaltext").html($(obj).val().replace(/\r\n|\r|\n/g, ','))

    } else if (getId == "two_text_1") {
        $(noenText).html($(obj).val().replace(/\r\n|\r|\n/g, '<br>'));
        $("#lineonefinaltext").html($(obj).val().replace(/\r\n|\r|\n/g, ','))
    } else if (getId == "two_text_2") {
        $(noenText2).html($(obj).val().replace(/\r\n|\r|\n/g, '<br>'));
        $("#linetwofinaltext").html("," + $(obj).val().replace(/\r\n|\r|\n/g, ','));
    } else if (getId == "three_text_1") {
        $(noenText).html($(obj).val().replace(/\r\n|\r|\n/g, '<br>'));
        $("#lineonefinaltext").html($(obj).val().replace(/\r\n|\r|\n/g, ','))
    } else if (getId == "three_text_2") {
        $(noenText2).html($(obj).val().replace(/\r\n|\r|\n/g, '<br>'));
        $("#linetwofinaltext").html("," + $(obj).val().replace(/\r\n|\r|\n/g, ','))
    } else if (getId == "three_text_3") {
        $(noenText3).html($(obj).val().replace(/\r\n|\r|\n/g, '<br>'));
        $("#linethreefineltext").html("," + $(obj).val().replace(/\r\n|\r|\n/g, ','));
    }

    if (getId == "three_text_3" || getId == "three_text_2" || getId == "three_text_1")
        cost_calcultor($(noenText), $(noenText2), $(noenText3));
    else if (getId == "two_text_1" || getId == "two_text_2")
        cost_calcultor($(noenText), $(noenText2));
    else if (getId == "one_text_1")
        cost_calcultor($(noenText));




}


function centerAlignEle(noenText) {
    var parentWidth = $(noenText).parent().parent().parent().parent().width();
    var parentHeight = $(noenText).parent().parent().parent().parent().height();
    var horizontalCenterPosition = (parentWidth / 3);
    if (window.innerWidth > 900) {
        var verticlePosition = 6;
        var horizontalPosition = 100;
    } else if (window.innerWidth < 900 && window.innerWidth > 760) {
        verticlePosition = 12;
        horizontalPosition = 80;
    } else if (window.innerWidth < 760 && window.innerWidth > 500) {
        verticlePosition = 80;
        horizontalPosition = 40;
    } else if (window.innerWidth < 500) {
        verticlePosition = 100;
        horizontalPosition = 30;
    }
    var verticalCenterPosition = Math.floor(parentHeight / verticlePosition);
    if (noenText == ".noenText2") {
        verticalCenterPosition = verticalCenterPosition + horizontalPosition;
    } else if (noenText == ".noenText3") {
        verticalCenterPosition = verticalCenterPosition + horizontalPosition * 2;
    } else {
        verticalCenterPosition = verticalCenterPosition;
    }
    $(noenText).css('left', horizontalCenterPosition);
    $(noenText).css('top', verticalCenterPosition);
}


var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides((slideIndex += n));
}

function currentSlide(e, type) {

    $('div.mySlides').css('background', ' url(' + $(e).attr('src') + ')');
    // type == 'baby'|| type == 'room' ? $('div.mySlides').addClass('bannar-img-main'):$('div.mySlides').removeClass('bannar-img-main');
    if (type == 'baby' || type == 'room' || type == 'bridal') {

        $('div.mySlides').addClass('bannar-img-main-zoom');
        $('div.mySlides').removeClass('bannar-img-main');
    } else {

        $('div.mySlides').removeClass('bannar-img-main-zoom');
        $('div.mySlides').addClass('bannar-img-main');
    }

    $('div.mob_slide_image').removeClass('mobile_tab_img_active');
    $(e).addClass('mobile_tab_img_active');
    // showSlides((slideIndex = n));
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");


    slides[slideIndex - 1].style.display = "block";


}






// custome

function checkFontSize(noenText, noenText2, noenText3) {
    var decreasedFontSize
    if (window.innerWidth > 1300) {
        noenText1FontSize = parseInt($(noenText).data("size"));
        noenText2FontSize = parseInt($(noenText2).data("size"));
        noenText3FontSize = parseInt($(noenText3).data("size"));
    } else if (window.innerWidth < 1300 && window.innerWidth > 900) {
        $.each($(".font-div"), function() {
            $(this).attr('data-desk', parseInt($(this).attr("data-desk")) - (parseInt($(this).attr("data-desk")) / 100) * 30);
            decreasedFontSize = $(this).data('desk')
            if ($(noenText).data("class") == $(this).data('class')) {
                noenText1FontSize = $(noenText).attr("data-size", decreasedFontSize).data('size');
            } else if ($(noenText2).data("class") == $(this).data('class')) {
                noenText2FontSize = $(noenText2).attr("data-size", decreasedFontSize).data('size');
            } else if ($(noenText3).data("class") == $(this).data('class')) {
                noenText3FontSize = $(noenText3).attr("data-size", decreasedFontSize).data('size');
            }
        });

    } else if (window.innerWidth < 900 && window.innerWidth > 760) {
        $.each($(".font-div"), function() {
            $(this).attr('data-desk', parseInt($(this).attr("data-desk")) - (parseInt($(this).attr("data-desk")) / 100) * 50);
            decreasedFontSize = $(this).data('desk')
            if ($(noenText).data("class") == $(this).data('class')) {
                noenText1FontSize = $(noenText).attr("data-size", decreasedFontSize).data('size');
            } else if ($(noenText2).data("class") == $(this).data('class')) {
                noenText2FontSize = $(noenText2).attr("data-size", decreasedFontSize).data('size');
            } else if ($(noenText3).data("class") == $(this).data('class')) {
                noenText3FontSize = $(noenText3).attr("data-size", decreasedFontSize).data('size');
            }
        });

    } else if (window.innerWidth < 760 && window.innerWidth > 500) {
        $.each($(".font-div"), function() {
            $(this).attr('data-desk', parseInt($(this).attr("data-desk")) - (parseInt($(this).attr("data-desk")) / 100) * 60);
            decreasedFontSize = $(this).data('desk')
            if ($(noenText).data("class") == $(this).data('class')) {
                noenText1FontSize = $(noenText).attr("data-size", decreasedFontSize).data('size');
            } else if ($(noenText2).data("class") == $(this).data('class')) {
                noenText2FontSize = $(noenText2).attr("data-size", decreasedFontSize).data('size');
            } else if ($(noenText3).data("class") == $(this).data('class')) {
                noenText3FontSize = $(noenText3).attr("data-size", decreasedFontSize).data('size');
            }
        });

    } else if (window.innerWidth < 500) {
        $.each($(".font-div"), function() {
            $(this).attr('data-desk', parseInt($(this).attr("data-desk")) - (parseInt($(this).attr("data-desk")) / 100) * 70);
            decreasedFontSize = $(this).data('desk')
            if ($(noenText).data("class") == $(this).data('class')) {
                noenText1FontSize = $(noenText).attr("data-size", decreasedFontSize).data('size');
            } else if ($(noenText2).data("class") == $(this).data('class')) {
                noenText2FontSize = $(noenText2).attr("data-size", decreasedFontSize).data('size');
            } else if ($(noenText3).data("class") == $(this).data('class')) {
                noenText3FontSize = $(noenText3).attr("data-size", decreasedFontSize).data('size');
            }
        });

    }
    return [noenText1FontSize, noenText2FontSize, noenText3FontSize];


}



function partialCode(id) {
    let cls = $("." + id).attr("data-class");
    $.each($(".font-div"), function() {
        $(this).removeClass("activeFont");
        if ($(this).hasClass(cls)) {
            $(this).addClass("activeFont");
        }
    });
}

function onFocusFun(id, id2) {
    noenText = "." + id;
    //  <
    // !--$('#input-text-id').val('#' + id);
    // -- >
    partialCode(id);
    $("#input-font-id").val("#" + id2);
}

function tabClick(txt) {
    $("#input-font-id").val("#" + txt + "_text_1");
}

function onClickFun(id, count) {
    noenText = "." + id;
    // <
    // !--$('#input-text-id').val('#' + id);
    // -- >
    partialCode(id);
    $.each($(".nav-link-tabs"), function() {
        if ($(this).hasClass("active")) {
            $("#input-font-id").val("#" + $(this).data("tab") + "_text_" + count);
        }
    });

    var tube_class = $(noenText).attr("data-color");
    $.each($(".color-selection"), function() {
        $(this).removeClass(tube_class + "-on");
        $(this).removeClass($(this).data("class") + "-on");
        $(this).addClass($(this).data("class"));

        if ($(this).data("class") == tube_class) {
            $(this).addClass(tube_class + "-on");
        }
    });
}

function getClass(e) {
    $.each($(".font-div"), function() {
        let font_class = $(this).data("class");
        $(noenText).removeClass(font_class);
    });
    $(noenText).addClass($(e).data("class"));
    // var check = window.innerWidth < 760 ? $(e).data("mob") : $(e).data("desk");
    $(noenText).css('font-size', $(e).data("desk") + "px");
    $(noenText).attr("data-size", $(e).data("desk"));
    $(noenText).attr("data-mob", $(e).data("mob"));
    $(noenText).attr("data-class", $(e).data("class"));
    $(noenText).attr("data-height", $(e).data("height"));
    $(noenText).attr("data-aspect_ratio", $(e).data("aspect_ratio"));

    noenText1 = '.noenText1'
    noenText2 = '.noenText2'
    noenText3 = '.noenText3'

    if ($('li.active').hasClass('one'))
        cost_calcultor($(noenText1));
    else if ($('li.active').hasClass('two'))
        cost_calcultor($(noenText1), $(noenText2));
    else if ($('li.active').hasClass('three'))
        cost_calcultor($(noenText1), $(noenText2), $(noenText3));

    // $(noenText).parent().parent().attr('onclick').click
}

setInterval(function() {
    var i = 1;
    $.each($(".font-div"), function() {
        $(this).html("<span style='font-family:Arial !important;' class='top-tabs'>" + i + "</span><span>" + $($("#input-font-id").val()).val().substring(0, 4) + "</span>");
        i++;
    });
    $("span.WildScript").removeClass("activeFont");
}, 500);

function changeclass(e) {
    $tube = $(e).data("class");
    $.each($(".color-selection"), function() {
        let clr_class = $(this).data("class");
        $(this).removeClass(clr_class + "-on");
        $(this).addClass(clr_class);
        $(noenText).removeClass(clr_class + "-text");
    });
    $(e).removeClass($tube);
    $(e).addClass($tube + "-on");
    if (noenText == '.noenText1')
        $(".text-one-color-name").text($(e).data("name") + ',');
    if (noenText == '.noenText2')
        $(".text-two-color-name").text($(e).data("name") + ',');
    if (noenText == '.noenText3')
        $(".text-three-color-name").text($(e).data("name"));
    $(noenText).addClass($tube + "-text");
    if (($tube == 'cl-tube-12' || $tube == 'cl-tube-13' || $tube == 'cl-tube-8'))
        $(noenText + "backing").removeClass($tube + "-text").removeClass('backing-clear');
    else if (!$(noenText + "backing").hasClass('backing-clear'))
        $(noenText + "backing").removeClass($tube + "-text").addClass('backing-clear');
    $(noenText).attr("data-color", $tube);
}

function backingClass(e) {
    $.each($(".backing-li"), function() {
        let backing_class = $(this).data("class");
        $(".backing-text-behind").removeClass(backing_class);
    });
    $(".backing-color-text").text($(e).text().trim());
    $(".backing-text-behind").addClass($(e).data("class"));
}

function backingShapeClass(e) {
    $.each($(".backing-shape-li"), function() {
        let backing_class = $(this).data("class");
        // $(noenText).removeClass(backing_class);
        $(".backing-text-behind").removeClass(backing_class);
    });
    $(".backing-shape-text").text($(e).text().trim());
    $(".backing-text-behind").addClass($(e).data("class"));
}

function commonBtnFun3(e) {
    var final_price, total_price, install;
    total_price = parseFloat($('.price').html())
    if ($(e).hasClass("bg-F34EFF")) {
        if (!$(e).hasClass('rush-order') && !$(e).hasClass('default'))
            final_price = total_price - 10;
        else if ($(e).hasClass('rush-order')) {
            final_price = total_price - 50;
            getDeliverDate(21);
        }
        $(e).removeClass("bg-F34EFF ");

    } else {
        if (!$(e).hasClass('rush-order') && !$(e).hasClass('default'))
            final_price = total_price + 10;
        else if ($(e).hasClass('rush-order')) {
            final_price = total_price + 50;
            getDeliverDate(14)
        }
        $(e).addClass("bg-F34EFF");
    }
    install = $("div.bg-F34EFF").text();
    install = install.replace(/\s+/g, ", ");
    install = install.substring(1);
    $(".install-text").text(install);
    $('.price').html(final_price)
}

function textAlign(e) {
    $(noenText).parent().css({
        "text-align": e,
    });
}


function mobile_tab_img(elm, img) {

    $('img.' + img).click()
}



// drag


$("div.mockup").mousedown(function(e) {
    var senceDiv = $("#sence").offset();
    var dragDiv = $(noenText)
    var dragDivOffset = dragDiv.offset();
    var dragDivOffsetWidth = dragDiv.outerWidth(true)
    var dragDivOffsetHeight = dragDiv.outerHeight(true)
    var distanceX = e.pageX - dragDivOffset.left;
    var distanceY = e.pageY - dragDivOffset.top;


    var divID = $(this).attr('id');
    inputTextID = divID.substr(divID.length - 1, 1);
    //updateOptions();

    $(document).mousemove(function(e) {
        var x = e.pageX - distanceX;
        var y = e.pageY - distanceY;

        if (x < senceDiv.left) {
            x = senceDiv.left;
        } else if (x > (senceDiv.left + $("#sence").width() - dragDivOffsetWidth)) {
            x = senceDiv.left + $("#sence").width() - dragDivOffsetWidth;
        }

        if (y < senceDiv.top) {
            y = senceDiv.top;
        } else if (y > (senceDiv.top + $("#sence").height() - dragDivOffsetHeight)) {
            y = senceDiv.top + $("#sence").height() - dragDivOffsetHeight;
        }

        $(dragDiv).css({
            'position': 'absolute',
            'left': x - senceDiv.left + 'px',
            'top': y - senceDiv.top + 'px'
        });
    });

    $(document).mouseup(function() {
        $(document).off('mousemove');

    });

});



let moveTextUp=()=>{
    if(($(noenText)[1].offsetTop) > -6 ){
         $(noenText)[1].style.top = ($(noenText)[1].offsetTop-8) + 'px';
         $(noenText)[0].style.top = ($(noenText)[0].offsetTop-8) + 'px';
        }

    
 }
  let moveTextDown=()=>{
    let tagHeight = $(noenText)[0].offsetHeight;
    let bgImgHeight = document.querySelector('.h-700').clientHeight;
      if(($(noenText)[1].offsetTop + tagHeight) < bgImgHeight){
          $(noenText)[1].style.top = ($(noenText)[1].offsetTop+8) + 'px';
          $(noenText)[0].style.top = ($(noenText)[0].offsetTop+8) + 'px';
      }
 }
 let moveTextLeft=()=>{
     if(($(noenText)[0].offsetLeft) > -8){
         $(noenText)[1].style.left = ($(noenText)[1].offsetLeft-8) + 'px';
         $(noenText)[0].style.left = ($(noenText)[0].offsetLeft-8) + 'px';
     }

 }
 let moveTextRight=()=>{
     let tagWidth = $(noenText)[0].offsetWidth + 24;
     if(($(noenText)[0].offsetLeft + tagWidth) < window.innerWidth){
         $(noenText)[1].style.left = ($(noenText)[1].offsetLeft+8) + 'px';
         $(noenText)[0].style.left = ($(noenText)[0].offsetLeft+8) + 'px';
     }
 }

 document.onkeydown = function(e) {
    if(event.keyCode == 123) {
       return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
       return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
       return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
       return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
       return false;
    }
    if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)) {
       return false;
    }
  }


// Font size for bannar top text
if($( "#bannarTopText" ).hasClass( "f-22" )){
    let currentSize1 = $("#bannarTopText").css("font-size");
    let currentSizeNumber = parseFloat(currentSize1, 12);
    $("#bannarTopText").css("font-size", currentSizeNumber + 3);
}

