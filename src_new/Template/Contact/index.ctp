
<body class="contact">
    <div class="page_wrap">
        <?php echo $this->element('header/header'); ?>
        <?= $this->Flash->render() ?>
        <!-- .banner -->
        <section class="banner">
            <div class="container">
                <div class="banner_descp text-center">
                    <h3>Contact Us</h3>
                    <h4>We take communication with our customers seriously. We respond promptly to contact<br> requests, and in a professional, efficient manner.</h4>					
                </div>
            </div>
        </section><!-- /.banner -->

        <!-- .contact_form -->
        <div class="contact_form">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12 col-md-6">
                        <div class="form">
                            <h3>Send us message</h3>
                            <?php echo $this->Form->create($contact, array('class' => 'order_form relative')); ?>
                            <div class="form-group ib">
                                <input type="text" class="form-control" name="user_name" placeholder="Your name" required>
                            </div>
                            <div class="form-group ib">
                                <input type="email" class="form-control" name="email" placeholder="Email address" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name ="message" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn yellow_btn submit_btn"><span>send message</span></button>
                            <?php echo $this->Form->end(); ?>
                            <p class="note"><span>Note:</span>If you would like to get a rough estimate for a project right now, you can use our online
                            <?php 
                                        echo $this->Html->link(
                                            'quote',
                                            ['controller' => 'RequestFreeQuote', 'action' => 'index', '_full' => true],
                                            array('class'=>'','escape'=>false)
                                        );
                                    ?> 
                            feature.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12 col-md-6">
                        <div class="direct_contact">
                            <div class="section_head after black">
                                <h3>Direct contact</h3>
                            </div>
                            <div class="info after">
                                <h4>Customer Experience Team</h4>
                                <p>hello@psd4html.com</p>
                            </div>
                            <div class="info after">
                                <h4>Partnership Guys</h4>
                                <p>partner@psd4html.com</p>
                            </div>
                            <div class="info after">
                                <h4>Join us</h4>
                                <p>work@psd4html.com</p>
                            </div>
                            <div class="info">
                                <h4>Skype</h4>
                                <p>psd4html</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.contact_form -->
        <hr>
        <!-- .company_details -->
        <!--section class="company_details">
                <div class="container">
                        <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">						
                                        <div class="about_company">
                                                <h3>Company details</h3>
                                                <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                                <div class="office address">
                                                                        <h4>Office address:</h4>
                                                                        <address>Chop-Chop.org<br>Rynek 35, 50-102 Wroclaw<br>Poland, EU</address>	
                                                                </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                                <div class="billig address">
                                                                        <h4>Billing information:</h4>
                                                                        <address>Chop-Chop sp. z o.o.<br>Wloclawska 161, 87-100 Torun<br>Poland, EU<br>KRS: 0000297796<br>EU VAT: PL9562215331</address>	
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="working_hours about_company">
                                                <h3>Working hours</h3>
                                                <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                                <div class="computer_exp_team address">
                                                                        <h4>Customer Experience Team:</h4>
                                                                        <address>Chop-Chop sp. z o.o.<br>Wloclawska 161, 87-100 Torun<br>Poland, EU<br>KRS: 0000297796<br>EU VAT: PL9562215331</address>									
                                                                </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6">								
                                                                <div class="web_developers address">
                                                                        <h4>Web developers:</h4>
                                                                        <address>Chop-Chop sp. z o.o.<br>Wloclawska 161, 87-100 Torun<br>Poland, EU<br>KRS: 0000297796<br>EU VAT: PL9562215331</address>
                                                                </div>									
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </section-->
        <!-- /.company_details -->



        <!-- .get start -->
        <?php echo $this->element('header/getstart'); ?>
        <!-- /.get start -->

        <!-- .footer -->
        <!-- .footer -->
                <?php echo $this->element('header/footer'); ?>
		<!-- /.footer --><!-- /.footer -->
    </div>
    <?php
    echo $this->Html->script(array('/assets/js/filepicker.js'));
    ?>
    <script>
        $(".add_file").click(function () {
            filepicker.setKey("ArANNg6zwQDeW2M46N8Juz");
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
        $(document).ready(function () {
            $('.dd-selected-value').attr('name', 'budget_range');
        });
        $('.submit_btn').click(function(){
                
                if($("input[name='user_name']").val() == "" || $("input[name='user_name']").val() == null){
                    $("input[name='user_name']").css("border","1px solid #CB040B");
                    $('html, body').animate({
                        scrollTop: $("input[name='user_name']").offset().top -150
                    }, 1000);
                    return false;
                }
                if($("input[name='email']").val() == "" || $("input[name='email']").val() == null){
                    $("input[name='email']").css("border","1px solid #CB040B");
                    $('html, body').animate({
                        scrollTop: $("input[name='email']").offset().top -150
                    }, 1000);
                    return false;
                }
                if($("input[name='subject']").val() == "" || $("input[name='subject']").val() == null){
                    $("input[name='subject']").css("border","1px solid #CB040B");
                    $('html, body').animate({
                        scrollTop: $("input[name='subject']").offset().top -150
                    }, 1000);
                    return false;
                }
                if($("textarea[name='message']").val() == "" || $("textarea[name='message']").val() == null){
                    $("textarea[name='message']").css("border","1px solid #CB040B");
                    $('html, body').animate({
                        scrollTop: $("textarea[name='message']").offset().top -150
                    }, 1000);
                    return false;
                }
            });
        $("textarea[name='message'],input[name='user_name'],input[name='email'],input[name='subject']").keypress(function () {
                if($(this).val() != ""){
                    $(this).css("border","1px solid #e7e7e7");
                }else{
                    $(this).css("border","1px solid #CB040B");
                }
            });
    </script>
</body>