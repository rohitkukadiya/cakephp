
<body class="home_page home_v2">
    <div class="page_wrap">
        
        <?php echo $this->element('header/header'); ?>
        <!-- .banner -->
        <section class="banner">
            <div class="container">
                <div class="banner_descp text-center">
                    <h3>You’ve Created the Perfect Design for your Website <br>Now let the Best PSD to HTML Developer Code It</h3>
                    <h4>Our development team can take your stunning PSD designs, and convert<br>them into elegant, functional code that simply works.</h4>
                    <div class="btn_group">
                        <ul>
                            <li>
                            <?php 
                                        echo $this->Html->link(
                                            '<span>ORDER NOW</span>',
                                            ['controller' => 'OrderNow', 'action' => 'index', '_full' => true],
                                            array('class'=>'btn yellow_btn','escape'=>false)
                                        );
                                    ?>
                            </li>
                            <li>
                            <?php 
                                        echo $this->Html->link(
                                            '<span>REQUEST A QUOTE</span>',
                                            ['controller' => 'RequestFreeQuote', 'action' => 'index', '_full' => true],
                                            array('class'=>'btn border_btn','escape'=>false)
                                        );
                                    ?></li>
                        </ul>
                        <p><a><i class="fa fa-lock" aria-hidden="true"></i> We offer a full 100% money back guarantee.</a></p>
                    </div>
                </div>
            </div>
        </section><!-- /.banner -->

        <!-- .our services -->
        <section class="our_services">
            <div class="container-fluid">
                <ul>
                    <li>
                        
                         <?php 
                                        echo $this->Html->link(
                                            '<span class="icons_group">
                                <i class="icon_1"></i>
                                <i class="icon_2"></i>
                                <i class="icon_3"></i>
                            </span>
                            <h4>PSD to HTML</h4>
                            <p>Starting from $99</p>
                            <span class="start">start a project</span>',
                                            ['controller' => 'PsdToHtml', 'action' => 'index', '_full' => true],
                                            array('class'=>'descp','escape'=>false)
                                        );
                                    ?>

                    </li>
                    <li class="active">
                        <?php 
                                        echo $this->Html->link(
                                            '<span class="icons_group">
                                <i class="icon_1"></i>
                                <i class="icon_2"></i>
                                <i class="icon_4"></i>
                            </span>
                            <h4>PSD to wordpress</h4>
                            <p>Starting from $249</p>
                            <span class="start">start a project</span>',
                                            ['controller' => 'PsdToWordpress', 'action' => 'index', '_full' => true],
                                            array('class'=>'descp','escape'=>false)
                                        );
                                    ?>
                    </li>
                    <li>
                        
                        <?php 
                                        echo $this->Html->link(
                                            '<span class="icons_group">
                                <i class="icon_1"></i>
                                <i class="icon_2"></i>
                                <i class="icon_5"></i>
                            </span>
                            <h4>PSD to Email</h4>
                            <p>Starting from $199</p>
                            <span class="start">start a project</span>',
                                            ['controller' => 'PsdToEmail', 'action' => 'index', '_full' => true],
                                            array('class'=>'descp','escape'=>false)
                                        );
                                    ?>
                    </li>
                    <li>
                        
                        <?php 
                                        echo $this->Html->link(
                                            '<span class="icons_group">
                                <i class="icon_6"></i>
                            </span>
                            <h4>Explore further</h4>
                            <p>Starting from $500</p>
                            <span class="start">start a project</span>',
                                            ['controller' => 'CustomDevelopment', 'action' => 'index', '_full' => true],
                                            array('class'=>'descp','escape'=>false)
                                        );
                                    ?>
                    </li>
                </ul>
            </div>
        </section><!-- /.our services -->

        <!-- .cta -->
        <section class="cta">
            <div class="container">
                <div class="descp">
                    <h4>We operate a partner program for freelancers,<br>agencies and brands.</h4>
                    <?php 
                                        echo $this->Html->link(
                                            'Learn More',
                                            ['controller' => 'ForAgencies', 'action' => 'index', '_full' => true],
                                            array('class'=>'','escape'=>false)
                                        );
                                    ?>
                    
                </div>
            </div>
        </section><!-- /.cta -->

        <!-- .advantage -->
        <section class="advantage">
            <div class="container"> 
                <div class="section_head after">
                    <h2>Features of Our Core<br> Service Offering</h2>
                </div>          
                <div class="features">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="feature feature1 no_border">
                                <figure class="feature_icon"><img src="assets/images/feature1.png" alt="html"></figure>
                                <div class="feature_description">
                                    <h3 class="title">Hand-Coded and Optimized Mark-up</h3>
                                    <p>We produce SEO friendly mark-ups, with a high level of cross browser compatibility, backed up by our exceptional customer support. We strive to be the best at what we do.</p>
                                </div>
                                <div class="clr"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="feature feature2">
                                <figure class="feature_icon"><img src="assets/images/feature2.png" alt="support"></figure>
                                <div class="feature_description">
                                    <h3 class="title">365 Days of Post-Delivering Support</h3>
                                    <p>For every project we complete successfully, we give an entire full year of professional support to solve any problems you may have with the deliverables. </p>
                                </div>
                                <div class="clr"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="feature feature3 no_border">
                                <figure class="feature_icon"><img src="assets/images/feature3.png" alt="upfront"></figure>
                                <div class="feature_description">
                                    <h3 class="title">Start with only 10% Payment</h3>
                                    <p>We ask for just a 10% upfront payment before we start work on your project. We have faith in our own ability to deliver outstanding results worth paying for.</p>
                                </div>
                                <div class="clr"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="feature feature4">
                                <figure class="feature_icon"><img src="assets/images/feature4.png" alt="experts"></figure>
                                <div class="feature_description">
                                    <h3 class="title">Perfect Quality Every Time </h3>
                                    <p>Every project we complete, has been fully tested by our professional Quality and Assurance team before being sent to the client. This means exceptional results every time.</p>
                                </div>
                                <div class="clr"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .special -->
                <div class="special_bg">
                    <div class="special">
                        <div class="details">
                            <div class="special_icon"><img src="assets/images/special_icon.png" alt="special"></div>
                            <div class="special_descp">
                                <h3>Projects Include <span>$753</span> of Free Add-ons</h3>
                                <p>We don’t charge our clients for JavaScript development within a project. We offer almost $753 freebies for all of our clients. There are no hidden charges!</p>
                            </div>
                            <div class="clr"></div>
                        </div>  
                        <?php 
                                        echo $this->Html->link(
                                            'Learn More',
                                            ['controller' => 'FreeAddons', 'action' => 'index', '_full' => true],
                                            array('class'=>'','escape'=>false)
                                        );
                                    ?>              
                        
                    </div>
                </div><!-- /.special -->
            </div>
        </section><!-- /.advantage -->

        <!-- .work -->
        <section class="work">
            <div class="container-fluid">
                <div class="section_head after">
                    <h2>Some of our Latest Work</h2>
                    <p>Check out the amazing work some of our developers<br>have recently completed.</p>
                </div>
                <div class="latest_projects">
                    <ul class="project_block">
                        <li>
                            <div class="project no_left">
                                <img src="assets/images/work1.jpg" alt="work1">
                                <div class="project_overlay">
                                    <h5>NSID</h5>
                                    <p>PSD to HTML</p>
                                    <a href="http://projects.psd4html.com/NSID/" class="btn overlay_btn" target="_blank"><span>visit site</span></a>
                                </div>
                            </div>                          
                        </li>
                        <li>
                            <div class="project">
                                <img src="assets/images/work2.jpg" alt="work2">
                                <div class="project_overlay">
                                    <h5>PROISP</h5>
                                    <p>PSD to RESPONSIVE</p>
                                    <a href="http://projects.psd4html.com/proisp/" class="btn overlay_btn" target="_blank"><span>visit site</span></a>
                                </div>
                            </div>                          
                        </li>
                        <li>
                            <div class="project">
                                <img src="assets/images/work3.jpg" alt="work3">
                                <div class="project_overlay">
                                    <h5>BOLDSTORM</h5>
                                    <p>PSD to WORDPRESS</p>
                                    <a href="http://projects.psd4html.com/boldstorm/" class="btn overlay_btn" target="_blank"><span>visit site</span></a>
                                </div>
                            </div>                          
                        </li>
                        <li>
                            <div class="project no_right">
                                <img src="assets/images/work4.jpg" alt="work4">
                                <div class="project_overlay">
                                    <h5>ZAPEBOX</h5>
                                    <p>PSD to BOOTSTRAP</p>
                                    <a href="http://projects.psd4html.com/ZapeBox/" class="btn overlay_btn" target="_blank"><span>visit site</span></a>
                                </div>
                            </div>                          
                        </li>                       
                    </ul>
                </div>
                <?php 
                                        echo $this->Html->link(
                                            '<span>view all works</span>',
                                            ['controller' => 'Samples', 'action' => 'index', '_full' => true],
                                            array('class'=>'btn border_btn section_btn','escape'=>false)
                                        );
                                    ?>  
            </div>
        </section><!-- / .work -->

        <!-- .calculator -->
        <section class="cost_estimator">
            <?php 
            echo $this->Form->create(null);
            ?>
            <div class="container">
                <div class="section_head">
                    <h2>Get an Estimate</h2>
                    <p>No matter what type of conversion you need done, you can get a rough price now, using our project estimator.<br>This will give you an idea of how much we would charge for your project.</p>
                </div>
                <div class="calculator">
                    <ul>
                        <li>
                            <h4>project Type</h4>
                            <div class="form-group">
                                <select class="selectpicker form-control project_type" name="project_type">
                                    <option value="psd-to-html">PSD to HTML5</option>
                                    <option value="psd-to-wordpress">PSD to WordPress</option>   
                                    <option value="psd-to-email">PSD to Email</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <h4>Pages</h4>
                            <div class="trigger">
                                <span class="lft_arw"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                <span class="num">1</span>
                                <span class="rht_arw"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            </div>
                            <input type="hidden" name="page" value="1">
                        </li>
                        <li>
                            <h4>Responsive</h4>
                            <div class="checkbox responsive_checkbox">
                                <label><input type="checkbox" class="pretty_checkable" value="yes" name="responsive"><span>Yes, I want it responsive</span></label>
                            </div>

                        </li>
                        <li>
                            <div class="cost">
                                <h4>COST</h4>
                                <h6>$<span class="cost_price">99</span> (max)</h6>
                            </div>
                        </li>
                        <input type="hidden" name="home_page" value="yes">
                        <li>
                            <?php echo $this->Form->button('<span>GET STARTED NOW</span>', ['type' => 'submit','class' => 'btn yellow_btn']); ?>
                        </li>
                    </ul>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </section><!-- /.calculator -->

        <!-- .testimonials -->
        <section class="testimonials">
            <div class="container">
                <div class="section_head after">
                    <h2>What our clients say</h2>
                    <p>Check out what many of our happy clients say about the service we offer.</p>             
                </div>
                <div class="testimonial_list">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="review">
                                <h5 class="reader">Mike D</h5>
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <h3 class="review_title">Excellent service and communication</h3>
                                <p class="detailes_review">Very impressed with the work and communication from PSD4HTML. They quoted me a very reasonable price to convert a PSD to WordPress site with some custom animations. Gave me a completion date and delivered early. Even installed the completed project on my server vs emailing me the files or charging extra. Very easy to reach and always responded promptly to questions I had. Will use them again and will recommend to others.</p>
                            </div>

                            <div class="review">
                                <h5 class="reader">Dan</h5>
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <h3 class="review_title">Best PSD to HTML Service Provider</h3>
                                <p class="detailes_review">We entered the web development market looking for the developers that would be able to do justice to our very specific custom requirements and convert our PSD designs to HTML codes efficiently. PSD4HTML did all that we wanted and more, for our website. We have never felt the need to look beyond this shop that provides us with most speed efficient and clean solutions to all our web development need.</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="review">
                                <h5 class="reader">Ryan</h5>
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <h3 class="review_title">Friendly &amp; Knowledgeable with Great Support!</h3>
                                <p class="detailes_review">PSD4HTML went over and above the project expectations. They provided clear communications and very fast turnaround. After the project was completed, additional support was available without hesitation to ensure our satisfaction.I would highly recommend using PSD4HTML to anyone looking to convert psd to html, they deliver what they promise.</p>
                            </div>

                            <div class="review">
                                <h5 class="reader">James</h5>
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <h3 class="review_title">Great Service, High Quality Work, Delivered Quickly!</h3>
                                <p class="detailes_review">Very happy with my experience using PSD4HTML. Their customer service was strong from the beginning--they answered all of my questions quickly and honestly. They proposed a fast turnaround time for my project, and they delivered ahead of their own schedule. They made the slight revisions I requested fterwards and they also wrote back quickly and politely throughout the project. I'll definitely hire them again.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--a href="#" class="btn border_btn section_btn"><span>view all testimonials</span></a-->
            </div>          
        </section><!-- /.testimonials -->

        <!-- .get start -->
        <?php echo $this->element('header/getstart'); ?>
        <!-- /.get start -->

        <!-- .footer -->
                <?php echo $this->element('header/footer'); ?>
        <!-- /.footer -->
    </div>
    <?php
    echo $this->Html->script(array('/assets/js/calculator.js'));
    ?>

</body>