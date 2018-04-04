
<body class="order_page">
    <div class="page_wrap">
        <?php echo $this->element('header/header'); ?>
        <?= $this->Flash->render() ?>
        <div class="relative">
            <div class="container">
                <div class="order_main">
                    <div class="section_head">
                        <h2>Start Your Project With <span>PSD4HTML</span></h2>
                        <p>Over 7000+ projects Completed to Date</p>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-9">
                            <!-- .form container -->
                            <div class="form_wrapper">
                                <!-- .form -->
                                <?php echo $this->Form->create($order, array('class' => 'order_form relative')); ?>
                                <!-- .steps -->
                                <div class="steps">
                                <input class="form-control" name="original_refer" type="hidden" value="<?php echo $order['original_refer']; ?>">
                                    <!-- .steps 1 -->
                                    <div class="step_1">

                                        <a href="#" class="btn border_btn first_btn">
                                            <span class="circle">
                                                <span class="hidden_circle"><i class="fa fa-check" aria-hidden="true"></i></span>
                                            </span>
                                            <p>I want to start a new project</p>
                                        </a>
                                        <?php 
                                        echo $this->Html->link(
                                            '<span class="circle">
                                                <span class="hidden_circle"><i class="fa fa-check" aria-hidden="true"></i></span>
                                            </span>
                                            <p>I want to get a quote</p>',
                                            ['controller' => 'RequestFreeQuote', 'action' => 'index', '_full' => true],
                                            array('class'=>'btn border_btn second_btn','escape'=>false)
                                        );
                                    ?>
                                        
                                        <div class="conversion">
                                            <ul>
                                                <li id="psdtohtml">
                                                    <a data-price="99" data-price-inner="69" href="#" type="psdtohtml">
                                                        <h5 class="pro_type">PSD to HTML</h5>
                                                        <p class="proj_charge"><span class="main_page_price">$99</span>/<span class="inner_page_cost">$69</span></p>
                                                    </a>
                                                </li>
                                                <li id="psdtowp">
                                                    <a data-price="249" data-price-inner="69" href="#" type="psdtowp">
                                                        <h5 class="pro_type">PSD to WordPress</h5>
                                                        <p class="proj_charge"><span class="main_page_price">$249</span>/<span class="inner_page_cost">$69</span></p>
                                                    </a>
                                                </li>
                                                <li id="padtoemail">
                                                    <a data-price="129" data-price-inner="129" href="#" type="padtoemail">
                                                        <h5 class="pro_type">PSD to Email</h5>
                                                        <p class="proj_charge"><span class="main_page_price">$129</span></p>
                                                    </a>
                                                </li>
                                                <li id="other">
                                                    <a data-price="99" data-price-inner="99" href="https://www.psd4html.com/request-free-quote" type="other">
                                                        <h5 class="pro_type">Other</h5>
                                                        <p class="proj_charge"><span class="main_page_price">$500</span></p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <input class="form-control" id="project_type" name="project_type" type="hidden" value="<?php echo $order['project_type']; ?>">
                                        <div class="num_pages">
                                            <ul>
                                                <li>
                                                    <h5>Number of Pages:</h5>
                                                    <div class="trigger">
                                                        <span class="lft_arw"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                                        <span class="num">1</span>
                                                        <span class="rht_arw"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                                        <input type="hidden" name="total_pages" id="page_counter" value="<?php echo $order['total_pages']; ?>">
                                                    </div>
                                                </li>
                                                <li>
                                                    <h5>Do you want the website responsive?</h5>
                                                    <div class="checkbox c_radio">
                                                        <label><input type="radio" class="pretty_checkable responsive_yes" name="responsive" value="yes" checked>Yes</label>
                                                    </div>
                                                    <div class="checkbox c_radio no_margin">
                                                        <label><input type="radio" class="pretty_checkable responsive_no" name="responsive" value="no">No</label>
                                                    </div>
                                                    <input type="hidden" name="is_responsive" value="<?php echo $order['responsive']; ?>">
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- /.steps 1 -->

                                    <!-- .steps 2 -->
                                    <div class="step_2">
                                        <h4>Add Your Files and Notes</h4>
                                        <div class="form-group more_margin">
                                            <label>Instructions:</label>
                                            <textarea class="form-control height_full" name="instructions" id="instructions" rows="9" required></textarea>
                                        </div>
                                        <div class="form-group relative">
                                            <label>Upload your files here:</label>
                                            <input type="text" class="form-control bg_white">
                                            <a class="btn btn_black absolute add_file"><i>+</i>  Add file</a>
                                            <span class="placeholder absolute">Drag and Drop your file here or <a class="add_file">Select from PC</a></span>
                                            <!--div class="btns">
                                                    <a href="#" class="btn btn_blue"><i class="fa fa-dropbox" aria-hidden="true"></i> Add Files from Dropbox</a>
                                                    <a href="#" class="btn brdr_btn">Add files from link</a>
                                            </div-->
                                            <div class="filestackpicker">
                                                <!--<input type="filepicker" data-fp-apikey="AOWYnMBFtQxWIKC7S2g11z" data-fp-services="COMPUTER,BOX,CLOUDDRIVE,DROPBOX,GOOGLE_DRIVE,SKYDRIVE,URL,FTP,CUSTOMSOURCE,CLOUDAPP" data-fp-multiple="false" data-fp-mimetypes="*/*" name="file[]" onchange="alert(event.fpfile.url)">-->
                                                <input type="filepicker" data-fp-apikey="ArANNg6zwQDeW2M46N8Juz" data-fp-multiple="true" onchange="alert(event.fpfile.url)">
                                                <select multiple class="form-control" id="file_path" name="files_url[]" type="hidden">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="uploaded_file" style="margin-top: -28px;">
                                            <label></label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group margin_top">
                                                    <label>Your name:</label>
                                                    <input type="text" name="user_name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group margin_top  mob_space">
                                                    <label>Your email:</label>
                                                    <input type="email" name="email" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Apply Discount Voucher:</label>
                                                    <input type="text" name="coupon" id="voucher_code" class="form-control">
                                                    <label class="voucher_error">This coupon code is invalid or has expired</label>
                                                    <label class="voucher_sucess">Coupon code Applied Sucessfully</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-3">
                                                <div class="form-group blk">
                                                    <label>&nbsp;</label>
                                                    <a class="btn btn_black check_voucher">Apply Voucher</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="order margin_top">
                                            <h3>Pay $<span class="payable_price">100</span> Now To Get Started</h3>
                                            <ul class="check_boxes">
                                                <li>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="pretty_checkable check_first" data-label="" ><span>I accept the terms and conditions.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="pretty_checkable check_second" data-label="" ><span>Please showcase my project</span></label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <?php echo $this->Form->button('<span>Let’s Go!</span><br><span><i class="fa fa-unlock-alt" aria-hidden="true"></i> Secure and confidential</span>', ['type' => 'submit', 'class' => 'btn yellow_btn submit_btn']); ?>
                                        </div>
                                    </div><!-- /.steps 2 -->
                                </div><!-- /.steps -->

                                <div class="verticle_line absolute">
                                    <span class="circle absolute completed"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    <span class="circle absolute step2"><i class="fa fa-close" aria-hidden="true"></i></span>
                                </div>
                                <div class="horizontal_line absolute"></div>
                                <div class="verticle_line verticle_line_2 absolute">
                                    <span class="circle absolute step3"><i class="fa fa-close" aria-hidden="true"></i></span>
                                    <span class="circle absolute step4"><i class="fa fa-close" aria-hidden="true"></i></span>
                                </div>
                                <div class="horizontal_line horizontal_line_2 absolute"></div>

                                <div class="sticky_stop"></div>
                            </div>
                            <!-- /.form container -->
                        </div>

                        <div class="order_summary" id="sticky_box">
                            <div class="mobile_wrap">
                                <h4>Order Summary</h4>

                                <div class="descp">
                                    <h6>Project Type:</h6>
                                    <p class="project-type">PSD to WordPress</p>
                                </div>
                                <div class="descp">
                                    <h6>number of pages:</h6>
                                    <p><span class="pages">1</span> Pages</p>
                                </div>
                                <div class="descp">
                                    <h6>Delivery Date:</h6>
                                    <p class="delivery_date"></p>
                                    <input class="form-control" id="turnaround_time" name="turnaround_time" type="hidden" value="">
                                </div>
                                <div class="descp">
                                    <h6>Compatibility:</h6>
                                    <p class="responsive_site"></p>
                                </div>
                                <div class="descp">
                                    <h6>Price Breakdown:</h6>
                                    <p class="braek_down">Home Page - <span class="pages">1</span> X <span class="proj_price_home"></span></p>
                                    <p class="braek_down_inpage"> Inner Pages - <span id="count_inner_page"></span> X <span class="proj_price_inner"></span></p>
                                </div>
                                <div class="total">
                                    <p class="total_cost">Total: <span id="total_cost"></span></p>
                                    <p class="discount dicount_cost">Discount: <span id="discount"></span></p>
                                    <p class="final_price final_cost">Final Price: <span id="discount"></span></p>
                                    <input class="form-control" id="final_price" name="final_price" type="hidden" value="">
                                </div>
                                <div class="save">
                                    <p><span class="circle"><i class="fa fa-check" aria-hidden="true"></i></span> You save up to $753 
                                    <?php 
                                        echo $this->Html->link(
                                    'learn how',
                                        ['controller' => 'FreeAddons', 'action' => 'index', '_full' => true],
                                            array('class'=>'','escape'=>false)
                                        );
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- .footer -->
                <?php echo $this->element('header/footer'); ?>
		<!-- /.footer -->
        <div></div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php
    echo $this->Html->script(array('/assets/js/ordersummary.js'));
    echo $this->Html->script(array('/assets/js/filepicker.js'));
    ?>
</body>