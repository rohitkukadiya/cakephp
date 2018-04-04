<body>
    <div class="page_wrap">
        <?php echo $this->element('header/header'); ?>
        <?= $this->Flash->render() ?>
        <div class="container">
            <!-- .form container -->
            <div class="form_wrapper">
                <div class="order_main">
                    <div class="section_head">
                        <h2>Start Your Project With <span>PSD4HTML</span></h2>
                        <p>Over 7000+ projects Completed to Date</p>
                    </div>
                </div>
                <!-- .form -->
                <?php echo $this->Form->create($quote, array('class' => 'order_form relative')); ?>
                <!-- .steps -->
                <div class="steps">
                    <!-- .steps 1 -->
                    <div class="step_1">
                        <a href="#" class="btn border_btn first_btn active">
                            <span class="circle">
                                <span class="hidden_circle"><i class="fa fa-check" aria-hidden="true"></i></span>
                            </span>
                            <p>I want to get a quote</p>
                        </a>
                        <a href="#" class="btn border_btn second_btn">
                            <span class="circle">
                                <span class="hidden_circle"><i class="fa fa-check" aria-hidden="true"></i></span>
                            </span>
                            <p>I want to start a new project</p>
                        </a>
                    </div><!-- /.steps 1 -->

                    <!-- .steps 2 -->
                    <div class="step_2">
                        <h4>Your Project Details</h4>
                        <div class="form-group more_margin">
                            <label>Instructions:</label>
                            <textarea class="form-control height_full" rows="9" name="instruction" required></textarea>
                        </div>
                        <div class="form-group relative">
                            <label>Upload your files here:</label>
                            <input type="text" class="form-control bg_white">
                            <a class="btn btn_black absolute add_file"><i>+</i>  Add file</a>
                            <span class="placeholder absolute">Drag and Drop your file here or <a class="add_file">Select from PC</a></span>
                            <div class="filestackpicker">
                                <!--<input type="filepicker" data-fp-apikey="AOWYnMBFtQxWIKC7S2g11z" data-fp-services="COMPUTER,BOX,CLOUDDRIVE,DROPBOX,GOOGLE_DRIVE,SKYDRIVE,URL,FTP,CUSTOMSOURCE,CLOUDAPP" data-fp-multiple="false" data-fp-mimetypes="*/*" name="file[]" onchange="alert(event.fpfile.url)">-->
                                <input type="filepicker" data-fp-apikey="AOWYnMBFtQxWIKC7S2g11z" onchange="alert(event.fpfile.url)">
                                <input class="form-control" id="file_path" name="files_url" type="hidden">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>Your budget range:</label>
                                    <select class="selectpicker form-control budget_range" name="budget_range">
                                        <option value="500-1000">$500 - $1000</option>
                                        <option value="1000-2500">$1000 - $2500</option>	
                                        <option value="2500-5000">$2500 - $5000</option>
                                        <option value="5000-10000">$5000 - $10000</option>
                                        <option value="5000+">$5000+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>Your name:</label>
                                    <input type="text" class="form-control" name="user_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Your email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="order">
                            <h3>Your quote will be provided within 8 hours.</h3>
                            <?php echo $this->Form->button('<span>Get a FREE Quote</span><br><span><i class="fa fa-unlock-alt" aria-hidden="true"></i> Secure and confidential</span>', ['type' => 'submit', 'class' => 'btn yellow_btn']); ?>

                        </div><!-- /.steps 2 -->
                    </div><!-- /.steps -->
                    <div class="verticle_line absolute">
                        <span class="circle absolute"><i class="fa fa-check" aria-hidden="true"></i></span>
                        <span class="circle absolute"><i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                    <div class="horizontal_line absolute"></div>
                    <?php echo $this->Form->end(); ?><!-- .form -->
                </div><!-- /.form container -->
            </div>

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
        echo $this->Html->script(array('/assets/js/filepicker.js'));
        ?>
        <script>
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
            $(document).ready(function () {
                $('.dd-selected-value').attr('name', 'budget_range');
            });
        </script>
</body>