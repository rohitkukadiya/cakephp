<body class="thankyou_page">
    <div class="page_wrap">
        <?php echo $this->element('header/header'); ?>
        <!-- .banner -->
        <section class="privacy-policy thankyou">
            <div class="container">	
                <div class="tnc">
                    <div class="section_head ">
                        <h2>Thank you <?php echo $payment['name']; ?>!</h2>
                    </div>
                    <div class="conditions">						
                        <div class="terms text-center">
                            <p>We are happy to tell you that we have successfully received your order.</p>
                            <p>Your unique order ID is: <span><?php echo $payment['order_id']; ?></span>. Please keep this ID handy, as we<br> may ask you for it to identify your project if you have to contact us.</p>
                            <p>You will receive an order confirmation email shortly. If you do not<br> received this email, you may need to check your SPAM folder.</p>
                        </div>								
                    </div>
                </div>
            </div>
        </section><!-- /.banner -->		

        <!-- .footer -->
                <?php echo $this->element('header/footer'); ?>
		<!-- /.footer -->
    </div>

</body>