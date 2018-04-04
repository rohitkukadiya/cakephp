$(document).ready(function(){
    $("span.lft_arw ").click(function (){
         var pagecount = $(".num").html();
         if(pagecount > 1){
             pagecount = parseInt(pagecount) - 1;
         }   
         $(".num").html(pagecount);
         change_price();
    });
    
    $("span.rht_arw ").click(function (){
         var pagecount = $(".num").html();
         if(pagecount >= 1){
             pagecount = parseInt(pagecount) + 1;
         }   
         $(".num").html(pagecount);
         change_price();
    });
    $(".dd-options li").click(function(){
        change_price();
    });
    $('.responsive_checkbox').children('label').children('div').children('a').click(function(){
        change_price();
        /*if($(this).hasClass('checked')){
            change_price();
        }else{
            alert("not");
        }*/
    });
    
    function change_price(){
        //alert("hiii");
        var selectedopt = $(".dd-options li").children('a.dd-option-selected').children('input').val();
        if($(".responsive_checkbox").children('label').children('div').children('a').hasClass('checked')){
            var responsive = true;
        }else{
            var responsive = false;
        }
        //alert(responsive);
        var pagecount = $(".num").html();
        if(responsive == false){
            if(selectedopt == "psdtohtml"){
                if(pagecount == 1){
                    $(".cost .cost_price").html("99");
                }else{
                    pagecount = parseInt(pagecount) - 1
                    var total_price = parseInt(pagecount) * 69;
                    total_price = parseInt(total_price) + 99;
                    $(".cost .cost_price").html(total_price);
                }
            }else if(selectedopt == "psdtowp"){
                if(pagecount == 1){
                    $(".cost .cost_price").html("249");
                }else{
                    pagecount = parseInt(pagecount) - 1
                    var total_price = parseInt(pagecount) * 69;
                    total_price = parseInt(total_price) + 249;
                    $(".cost .cost_price").html(total_price);
                }
            }else if(selectedopt == "padtoemail"){
                var total_price = parseInt(pagecount) * 129;
                $(".cost .cost_price").html(total_price);
            }  
        }else{
            if(selectedopt == "psdtohtml"){
                if(pagecount == 1){
                    $(".cost .cost_price").html("189");
                }else{
                    pagecount = parseInt(pagecount) - 1
                    var total_price = parseInt(pagecount) * 129;
                    total_price = parseInt(total_price) + 189;
                    $(".cost .cost_price").html(total_price);
                }
            }else if(selectedopt == "psdtowp"){
                if(pagecount == 1){
                    $(".cost .cost_price").html("339");
                }else{
                    pagecount = parseInt(pagecount) - 1
                    var total_price = parseInt(pagecount) * 129;
                    total_price = parseInt(total_price) + 339;
                    $(".cost .cost_price").html(total_price);
                }
            }else if(selectedopt == "padtoemail"){
                var total_price = parseInt(pagecount) * 199;
                $(".cost .cost_price").html(total_price);
            } 
        }
    }
});