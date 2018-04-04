$(document).ready(function () {
    $("span.lft_arw ").click(function () {

        if (check_type_selection()) {

            var pagecount = $(".num").html();

            if (pagecount > 1) {

                pagecount = parseInt(pagecount) - 1;

            } else {



            }

            $(".num").html(pagecount);

             $("#page_counter").val(pagecount);

            change_no_of_pages();

            change_price();

        }

    });



    $("span.rht_arw ").click(function () {

        if (check_type_selection()) {

            var pagecount = $(".num").html();

            if (pagecount >= 1) {

                pagecount = parseInt(pagecount) + 1;

            }

            $(".num").html(pagecount);

             $("#page_counter").val(pagecount);

            change_no_of_pages();

            change_price();

            $(".step3").addClass('completed');

            $(".step3").children('i').removeClass('fa-close');

            $(".step3").children('i').addClass('fa-check');

        }

    });

    // For Project Type

    $(".conversion").children("ul").children("li").children('a').click(function () {

        $(".conversion").children("ul").children("li").removeClass('active');
        $(this).parent("li").addClass('active');
        $(".order_main .conversion > ul > li").css('border','1px solid #e5e5e5');
        $(this).parent("li").css('border','1px solid #f9ce14');
        var producttype = $(this).children("h5").html();
        $(".project-type").html(producttype);
        $("#project_type").val(producttype);
        $(".step2").addClass('completed');
        $(".step2").children('i').removeClass('fa-close');
        $(".step2").children('i').addClass('fa-check');
        $("#sticky_box").css('visibility','visible');
        change_price();

    });



    function check_type_selection() {

        if ($(".conversion").children("ul").children("li").hasClass('active')) {

            return true;

        } else {

            return false;

        }

    }

    // For total pages 

    function change_no_of_pages() {

        var pagecount = $(".num").html();

        $('.pages').html(pagecount);

    }

    // For responsive 

    $(".prettyradio").on("click", function () {

        var compibility = $(this).find("input[type='radio']").val();

        if (compibility == "yes") {

            $('.responsive_site').html('Responsive');

        } else {

            $('.responsive_site').html('Desktop');

        }

        change_price();

    });

    $("#instructions").keypress(function () {

        if (check_type_selection()) {

            if ($(this).val() != "") {

                $(".step4").addClass('completed');

                $(".step4").children('i').removeClass('fa-close');

                $(".step4").children('i').addClass('fa-check');
                $("#instructions").css('border','1px solid #e7e7e7');

            } else {

                $(".step4").removeClass('completed');

                $(".step4").children('i').addClass('fa-close');

                $(".step4").children('i').removeClass('fa-check');

            }

        }

    });

    // Delivery Date

    delivery_date(3);

    //change_price();

    function delivery_date(total_days) {

        var todaysDate = new Date();

        todaysDate.setDate(todaysDate.getDate() + total_days);

        var dd = todaysDate.getDate();

        var mm = todaysDate.getMonth();

        var y = todaysDate.getFullYear();

        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June",

            "July", "Aug", "Sep", "Oct", "Nov", "Dec"

        ];

        $(".delivery_date").html(monthNames[mm] + ' ' + dd + " (" + total_days + " b. days)");

        $("#turnaround_time").val(monthNames[mm]+' '+dd+" ("+total_days+" b. days)");

    }

    function change_price() {



        var selectedopt = $(".conversion").children("ul").children("li.active").children('a').attr('type');

        if ($("input[name='responsive']:checked").val() == "yes") {

            var responsive = true;

        } else {

            var responsive = false;

        }

        var pagecount = $(".num").html();

        if (responsive == false) {

            if (selectedopt == "psdtohtml") {

                if (pagecount == 1) {
                    $(".braek_down_inpage").hide();
                    $(".total #total_cost").html("$99");

                    $("#final_price").val("99");

                    var payable_price = 99*10/100;

                    $(".payable_price").html(payable_price);

                    $(".braek_down").html('Home Page - <span class="pages">1</span> X <span class="proj_price_home">$99</span>');

                    delivery_date(2)

                } else {
                    $(".braek_down_inpage").show();
                    pagecount = parseInt(pagecount) - 1

                    var total_price = parseInt(pagecount) * 69;

                    total_price = parseInt(total_price) + 99;

                    $(".total #total_cost").html("$" + total_price);

                    $("#final_price").val(total_price);

                    var payable_price = total_price * 10/100;

                    $(".payable_price").html(payable_price);

                    $(".braek_down").html('Home Page - <span class="pages">1</span> X <span class="proj_price_home">$99</span>');

                    $(".braek_down_inpage").html('Inner Pages - <span id="count_inner_page">' + pagecount + '</span> X <span class="proj_price_inner">$69</span>');

                    var delivery_days = parseInt(pagecount) / 2;

                    delivery_days = Math.ceil(delivery_days);

                    delivery_days = delivery_days + 3;

                    delivery_date(delivery_days)

                }

            } else if (selectedopt == "psdtowp") {

                if (pagecount == 1) {
                    $(".braek_down_inpage").hide();
                    $(".total #total_cost").html("$249");

                     $("#final_price").val("249");

                     var payable_price = 249 * 10/100;

                    $(".payable_price").html(payable_price);

                    $(".braek_down").html('Home Page - <span class="pages">1</span> X <span class="proj_price_home">$249</span>');

                    delivery_date(3)

                } else {
                    $(".braek_down_inpage").show();
                    pagecount = parseInt(pagecount) - 1

                    var total_price = parseInt(pagecount) * 69;

                    total_price = parseInt(total_price) + 249;

                    $(".total #total_cost").html("$" + total_price);

                    var payable_price = total_price * 10/100;

                    $(".payable_price").html(payable_price);

                    $("#final_price").val(total_price);

                    $(".braek_down").html('Home Page - <span class="pages">1</span> X <span class="proj_price_home">$249</span>');

                    $(".braek_down_inpage").html('Inner Pages - <span id="count_inner_page">' + pagecount + '</span> X <span class="proj_price_inner">$69</span>');

                    var delivery_days = parseInt(pagecount) / 2;

                    delivery_days = Math.ceil(delivery_days);

                    delivery_days = delivery_days + 3;

                    delivery_date(delivery_days)

                }

            } else if (selectedopt == "padtoemail") {

                var total_price = parseInt(pagecount) * 129;

                $(".total #total_cost").html("$" + total_price);

                $("#final_price").val(total_price);

                var payable_price = total_price * 10/100;

                $(".payable_price").html(payable_price);

                $(".braek_down").html('Home Page - <span class="pages">' + pagecount + '</span> X <span class="proj_price_home">$129</span>');

                $(".braek_down_inpage").html("");

                delivery_date(1)

            } else if (selectedopt == "other") {

                /*var total_price = parseInt(pagecount) * 99;

                $(".total #total_cost").html("$" + total_price);

                $("#final_price").val(total_price);

                var payable_price = total_price * 10/100;

                $(".payable_price").html(payable_price);

                $(".braek_down").html('Home Page - <span class="pages">' + pagecount + '</span> X <span class="proj_price_home">$99 to $500</span>');

                $(".braek_down_inpage").html("");

                delivery_date(1)*/
                window.location.replace("https://www.psd4html.com/request-free-quote");

            }

        } else {

            if (selectedopt == "psdtohtml") {

                if (pagecount == 1) {
                    $(".braek_down_inpage").hide();
                    $(".total #total_cost").html("$189");

                    $("#final_price").val("189");

                    var payable_price = 189 * 10/100;

                    $(".payable_price").html(payable_price);

                    $(".braek_down").html('Home Page - <span class="pages">1</span> X <span class="proj_price_home">$189</span>');

                    delivery_date(3)

                } else {
                    $(".braek_down_inpage").show();
                    pagecount = parseInt(pagecount) - 1

                    var total_price = parseInt(pagecount) * 129;

                    total_price = parseInt(total_price) + 189;

                    $(".total #total_cost").html("$" + total_price);

                    $("#final_price").val(total_price);

                    var payable_price = total_price * 10/100;

                    $(".payable_price").html(payable_price);

                    $(".braek_down").html("Home Page - 1 X $189");

                    $(".braek_down_inpage").html('Inner Pages - <span id="count_inner_page">' + pagecount + '</span> X <span class="proj_price_inner">$129</span>');

                    var delivery_days = parseInt(pagecount) / 2;

                    delivery_days = Math.ceil(delivery_days);

                    delivery_days = delivery_days + 3;

                    delivery_date(delivery_days)

                }

            } else if (selectedopt == "psdtowp") {

                if (pagecount == 1) {
                    $(".braek_down_inpage").hide();
                    $(".total #total_cost").html("$339");

                    $("#final_price").val("339");

                    var payable_price = 339 * 10/100;

                    $(".payable_price").html(payable_price);

                    $(".braek_down").html('Home Page - <span class="pages">1</span> X <span class="proj_price_home">$339</span>');

                    delivery_date(3)

                } else {
                    $(".braek_down_inpage").show();
                    pagecount = parseInt(pagecount) - 1

                    var total_price = parseInt(pagecount) * 129;

                    total_price = parseInt(total_price) + 339;

                    $(".total #total_cost").html("$" + total_price);

                    $("#final_price").val(total_price);

                    var payable_price = total_price * 10/100;

                    $(".payable_price").html(payable_price);

                    $(".braek_down").html("Home Page - 1 X $339");

                    $(".braek_down_inpage").html('Inner Pages - <span id="count_inner_page">' + pagecount + '</span> X <span class="proj_price_inner">$129</span>');

                    var delivery_days = parseInt(pagecount) / 2;

                    delivery_days = Math.ceil(delivery_days);

                    delivery_days = delivery_days + 3;

                    delivery_date(delivery_days)

                }

            } else if (selectedopt == "padtoemail") {

                var total_price = parseInt(pagecount) * 199;

                $(".total #total_cost").html("$" + total_price);

                $("#final_price").val(total_price);

                var payable_price = total_price * 10/100;

                $(".payable_price").html(payable_price);

                $(".braek_down").html('Home Page - <span class="pages">' + pagecount + '</span> X <span class="proj_price_home">$199</span>');

                $(".braek_down_inpage").html("");

                delivery_date(2)

            } else if (selectedopt == "other") {

               /*var total_price = parseInt(pagecount) * 99;

                $(".total #total_cost").html("$" + total_price);

                $("#final_price").val(total_price);

                var payable_price = total_price * 10/100;

                $(".payable_price").html(payable_price);

                $(".braek_down").html('Home Page - <span class="pages">' + pagecount + '</span> X <span class="proj_price_home">$99 to $500</span>');

                $(".braek_down_inpage").html("");

                delivery_date(1)*/
                window.location.replace("https://www.psd4html.com/request-free-quote");

            }



        }

    }

    /*sticky_box js*/

    var top = $('#sticky_box').offset().top - parseFloat($('#sticky_box').css('marginTop').replace(/auto/, 0));

    $(window).scroll(function (evt) {

        var windowWidth = $(window).width();

        if (windowWidth > 767) {

            var leftHeight = $('.steps').height();

            var sbHeight = $('#sticky_box').height();

            //alert(leftHeight);

            var footTop = $('.sticky_stop').offset().top - parseFloat($('.sticky_stop').css('marginTop').replace(/auto/, 0));

            var maxY = footTop - $('#sticky_box').outerHeight();

            var y = $(this).scrollTop();

            if (y > top) {

                if (y < maxY) {

                    $('#sticky_box').addClass('sticky').removeAttr('style');

                } else if (leftHeight < sbHeight) {

                    $('#sticky_box').removeClass('sticky').css({

                        position: 'static'

                    });

                } else {

                    $('#sticky_box').removeClass('sticky').css({

                        position: 'absolute',

                        top: (maxY - top) + 'px'

                    });

                }

            } else {

                $('#sticky_box').removeClass('sticky');

            }

        }

        if (windowWidth <= 767) {

            function isVisible(elment) {

                var vpH = $(window).height(), // Viewport Height

                    st = $(window).scrollTop(), // Scroll Top

                    y = $(elment).offset().top;



                return y <= (vpH + st);

            }



            function setSideNotePos(){

                $(window).scroll(function() {

                    if (isVisible($('.footer'))) {

                        $('#sticky_box').css('position','absolute');

                        $('#sticky_box').addClass("top");

                                    

                                } else {

                                    $('#sticky_box').css('position','fixed');

                                    $('#sticky_box').removeClass("top");

                                }

                            });

            }

            $(document).ready(function() {

                setSideNotePos();

            });

        }
        if($("#project_type").val() != ""){
            $("#sticky_box").css('visibility','visible');
        }
    });

    // js for add file.

    $(".add_file").click(function () {

        filepicker.setKey("ArANNg6zwQDeW2M46N8Juz");

        filepicker.pickMultiple(

                {
                    
                },
                function (Blob) {

                    console.log(Blob[0].url);
                    var sidebarheight = $(".order_main .order_form .verticle_line.verticle_line_2").height();
                    $(Blob).each(function(key){
                        sidebarheight = parseInt(sidebarheight) + 14;
                        $(".order_main .order_form .verticle_line.verticle_line_2").height(sidebarheight);
                        $("#file_path").val(Blob[key].url);
                        $("#file_path").append('<option value="'+Blob[key].url+'">'+Blob[key].filename+'</option>');
                        var filelink = "<a href='"+Blob[key].url+"' target='_blank'>"+Blob[key].filename+"</a><br>"
                        $(".uploaded_file label").append(filelink);
                    });
                    $('#file_path option').attr('selected', true);

                }

        );



    });

    

    $('.check_voucher').click(function () {

        var task_id = $("#voucher_code").val();
        if(task_id == "" || task_id == null){
            $("#voucher_code").css("border","1px solid #CB040B");
        }
        var url = "order-now/check_coupon/" + task_id;

        if (check_type_selection()) {

            jQuery.ajax({

                type: "POST",

                url: url,

                success: function (data) {

                    if (data == "no") {

                        $('.voucher_sucess').hide();

                        $('.voucher_error').show();

                        $('.final_cost,.dicount_cost').hide();

                    } else {

                        $('.voucher_sucess').show();

                        $('.voucher_error').hide();

                        data = $.parseJSON(data);

                        var copoun_discount = data['coupon_value'];

                        var total_amt = $('#total_cost').html();

                        total_amt = total_amt.substring(1);

                        var dicount_amt = parseInt(total_amt) * parseInt(copoun_discount) / 100;

                        $('.dicount_cost span').html('- $' + dicount_amt);

                        var fina_price = parseFloat(total_amt) - parseFloat(dicount_amt);
                        fina_price = Math.floor(fina_price)
                        $('.final_cost span').html('$' + fina_price);

                        $("#final_price").val(fina_price);

                        var payable_price = fina_price * 10/100;

                        $(".payable_price").html(payable_price);

                        $('.final_cost,.dicount_cost').show();

                        //$('.total_cost').children('span').addClass('right_flt');

                        console.log(dicount_amt);

                    }

                }

            });

        }

    });

    $('.submit_btn').click(function(){

        if($("#project_type").val() == "" || $("#instructions").val() == null){
            $(".order_main .conversion > ul > li").css("border","1px solid #CB040B");
            $('html, body').animate({
                scrollTop: $(".order_main .conversion > ul > li").offset().top - 200
            }, 1000);
            return false;
        }

        if($("#instructions").val() == "" || $("#instructions").val() == null){
            $("#instructions").css("border","1px solid #CB040B");
            $('html, body').animate({
                scrollTop: $("#instructions").offset().top - 200
            }, 1000);
            return false;
        }
        if($("input[name='user_name']").val() == "" || $("input[name='user_name']").val() == null){
            $("input[name='user_name']").css("border","1px solid #CB040B");
            $('html, body').animate({
                scrollTop: $("input[name='user_name']").offset().top - 200
            }, 1000);
            return false;
        }
        if($("input[name='email']").val() == "" || $("input[name='email']").val() == null){
            $("input[name='email']").css("border","1px solid #CB040B");
            $('html, body').animate({
                scrollTop: $("input[name='email']").offset().top - 200
            }, 1000);
            return false;
        }
        if($(".check_first").prop('checked') != true){
            $('.check_first').next('a').css("border","1px solid #CB040B");
            $('html, body').animate({
                scrollTop: $(".check_first").offset().top - 200
            }, 1000);
            return false;
        }

    });
    
    $(".prettycheckbox a").click(function(){
        $(this).css("border","none");
    });

    $("input[name='user_name'],input[name='email']").keypress(function () {
        if($(this).val() != ""){
            $(this).css("border","1px solid #e7e7e7");
        }else{
            $(this).css("border","1px solid #CB040B");
        }
    });

    if($("#project_type").val() != ""){

        if($("#project_type").val() == "PSD to HTML"){
            $("#psdtohtml").addClass('active');
        }else if($("#project_type").val() == "PSD to WordPress"){
            $("#psdtowp").addClass('active');
        }else if($("#project_type").val() == "PSD to Email"){
            $("#padtoemail").addClass('active');
        }else if($("#project_type").val() == "Other"){
            $("#other").addClass('active');
        }
        $("#sticky_box").css('visibility','visible');
    }
    // page counter setting //
    if($("#page_counter").val() > 1){
        $(".num").html($("#page_counter").val());
        $(".step3").addClass('completed');
        $(".step3").children('i').removeClass('fa-close');
        $(".step3").children('i').addClass('fa-check'); 
        $(".check_boxes .pretty_checkable").attr('checked', false);
        $(".check_boxes .pretty_checkable").each(function(key){
            $(this).next('a').removeClass('checked');
        })
    }
    

    // for responsive 
    
    if($("input[name='is_responsive']").val() == "no"){
        $(".responsive_no").next('a').addClass('checked');
        $(".responsive_yes").next('a').removeClass('checked');
        $(".responsive_no").attr('checked', true);
        $('.responsive_site').html('Desktop');

    }else if($("input[name='is_responsive']").val() == "yes"){
        $(".responsive_no").next('a').removeClass('checked');
        $(".responsive_yes").next('a').addClass('checked');
        $(".responsive_yes").attr('checked', true);
        $('.responsive_site').html('Responsive');
    }
    change_price();
    //$(".check_second").attr('checked', false);
});





