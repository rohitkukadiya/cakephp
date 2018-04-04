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
        var producttype = $(this).children("h5").html();
        $(".project-type").html(producttype);
        $("#project_type").val(producttype);
        $(".step2").addClass('completed');
        $(".step2").children('i').removeClass('fa-close');
        $(".step2").children('i').addClass('fa-check');
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
                    $(".total #total_cost").html("$99");
                    $("#final_price").val("99");
                    var payable_price = 99*10/100;
                    $(".payable_price").html(payable_price);
                    $(".braek_down").html('Home Page - <span class="pages">1</span> X <span class="proj_price_home">$99</span>');
                    delivery_date(2)
                } else {
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
                    $(".total #total_cost").html("$249");
                     $("#final_price").val("249");
                     var payable_price = 249 * 10/100;
                    $(".payable_price").html(payable_price);
                    $(".braek_down").html('Home Page - <span class="pages">1</span> X <span class="proj_price_home">$249</span>');
                    delivery_date(3)
                } else {
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
            } else {
                var total_price = parseInt(pagecount) * 99;
                $(".total #total_cost").html("$" + total_price);
                $("#final_price").val(total_price);
                var payable_price = total_price * 10/100;
                $(".payable_price").html(payable_price);
                $(".braek_down").html('Home Page - <span class="pages">' + pagecount + '</span> X <span class="proj_price_home">$99</span>');
                $(".braek_down_inpage").html("");
                delivery_date(1)
            }
        } else {
            if (selectedopt == "psdtohtml") {
                if (pagecount == 1) {
                    $(".total #total_cost").html("$189");
                    $("#final_price").val("189");
                    var payable_price = 189 * 10/100;
                    $(".payable_price").html(payable_price);
                    $(".braek_down").html('Home Page - <span class="pages">1</span> X <span class="proj_price_home">$189</span>');
                    delivery_date(3)
                } else {
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
                    $(".total #total_cost").html("$339");
                    $("#final_price").val("339");
                    var payable_price = 339 * 10/100;
                    $(".payable_price").html(payable_price);
                    $(".braek_down").html('Home Page - <span class="pages">1</span> X <span class="proj_price_home">$339</span>');
                    delivery_date(3)
                } else {
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
            } else {
                var total_price = parseInt(pagecount) * 99;
                $(".total #total_cost").html("$" + total_price);
                $("#final_price").val(total_price);
                var payable_price = total_price * 10/100;
                $(".payable_price").html(payable_price);
                $(".braek_down").html('Home Page - <span class="pages">' + pagecount + '</span> X <span class="proj_price_home">$99</span>');
                $(".braek_down_inpage").html("");
                delivery_date(1)
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

            function setSideNotePos() {
                $(window).scroll(function () {
                    if (isVisible($('.footer'))) {
                        $('#sticky_box').css('position', 'absolute');

                    } else {
                        $('#sticky_box').css('position', 'fixed');
                    }
                });
            }
            $(document).ready(function () {
                setSideNotePos();
            });
        }
    });
    // js for add file.
    $(".add_file").click(function () {
        filepicker.setKey("AOWYnMBFtQxWIKC7S2g11z");
        filepicker.pick(
                {
                },
                function (Blob) {
                    //var upload_detail = replaceHtmlChars(JSON.stringify(Blob));
                    $("#file_path").val(Blob.url);
                    //console.log(Blob.url);
                }
        );

    });
    
    $('.check_voucher').click(function () {
        var task_id = $("#voucher_code").val();
        var url = "order/check_coupon/" + task_id;
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
                        $('.final_cost span').html('$' + fina_price);
                        $("#final_price").val(fina_price);
                        var payable_price = fina_price * 10/100;
                        $(".payable_price").html(payable_price);
                        $('.final_cost,.dicount_cost').show();
                        $('.total_cost').children('span').addClass('right_flt');
                        console.log(dicount_amt);
                    }
                }
            });
        }
    });
    
});


