
<body class="thankyou_page">
    <div class="page_wrap">
        <?php echo $this->element('header/header'); ?>

        <!-- .banner -->
        <section class="privacy-policy thankyou">
            <div class="container">	
                <div class="tnc">
                    <div class="section_head ">
                        <h2>Thank you <?php echo $contact['user_name']; ?>!</h2>
                    </div>
                    <div class="conditions">						
                        <div class="terms text-center">
                            <p>We have received your query.</p>
                            <p>Your unique query ID is: <span><?php echo $contact['contact_id']; ?></span>. Please keep this ID, as we<br> may need it to identify your query if you need to contact us.</p>
                            <p>We will get back to you within the next 4 hours with more details.</p>
                        </div>								
                    </div>
                </div>
            </div>
        </section><!-- /.banner -->		

        <!-- .footer -->
                <?php echo $this->element('header/footer'); ?>
		<!-- /.footer -->
    </div>

    <?php
    echo $this->Html->script(array('/assets/js/jquery.min.js'));
    echo $this->Html->script(array('/assets/js/bootstrap.min.js'));
    echo $this->Html->script(array('/assets/js/jquery.ddslick.min.js'));
    echo $this->Html->script(array('/assets/js/prettyCheckable.min.js'));
    echo $this->Html->script(array('/assets/js/custom.js'));
    ?>
</body>