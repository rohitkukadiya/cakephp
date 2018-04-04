<body class="psd_to_wp">
	<div class="page_wrap">
		<?php echo $this->element('header/header'); ?>
		<!-- .banner -->
		<section class="banner cd">
			<div class="container">
				<div class="banner_descp text-center">
					<h3>Your Single Source for Custom Development</h3>
					<h4>If you have more advanced website development needs, we are happy to quote on customer<br> development work. We can undertake custom development in PHP and JavaScript, and can<br> work upon both front-end and back-end infrastructure.</h4>
				</div>
			</div>
		</section><!-- /.banner -->
		
		
		<!-- .features -->
		<section class="features advantage space_less">
			<div class="container">	
				<!--div class="section_head after">
					<h2>Your Single Source for Custom Development</h2>
				</div-->			
				<div class="features_content">
					<div class="row pad_bottom">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="feature_decp">
								<h3 class="title">Front-End Development</h3>
								<p>Let us take on your complex front-end and UI development project, to make sure you deliver a stunning, functionally website experience for your visitors.</p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="feature_decp">
								<h3 class="title">PHP Development</h3>
								<p>We are fully capable of developing high quality PHP powered backend systems, based upon client specifications and requirements when necessary. </p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="feature_decp">
								<h3 class="title">WordPress Development</h3>
								<p>We can take your graphic design, and convert it into a fast loading, highly compatible WordPress theme that is easy to install and maintain.</p>
							</div>
						</div>
					</div>
					<div class="row pad_bottom">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="feature_decp">
								<h3 class="title">JavaScript Development</h3>
								<p>If you need custom JavaScript code developed, then our team is able to provide you with high quality, hand crafted, efficient code.</p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="feature_decp">
								<h3 class="title">Email Development</h3>
								<p>Crafting a highly compatible email template is not simple. So let us do this for you, we can supply a template ready for integration with your mailer in a day.</p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="feature_decp">
								<h3 class="title">Design to HTML</h3>
								<p>We can take files produced in Sketch, Photoshop or AI and convert them into W3C compatible HTML layouts that work across all major browsers. </p>
							</div>
						</div>
					</div>
					<div class="row pad_bottom">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="feature_decp">
								<h3 class="title">Magento Development</h3>
								<p>WE can turn your design concepts into a completely functional ecommerce site using the popular open source Magento platform. </p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="feature_decp">
								<h3 class="title">Joomla Development</h3>
								<p>We can convert your flat designs into a template that can be used to power a website that is using the popular Joomla CMS.</p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="feature_decp">
								<h3 class="title">Drupal Development</h3>
								<p>Drupal is a powerful content publishing tool, let us turn your flat designs into fully functional templates for a Drupal powered website.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="feature_decp">
								<h3 class="title">Shopify Development</h3>
								<p>We can build you an impressive looking, fully functional online store using this ecommerce platform. We can develop Shopify code based on your designs, or develop an entire Shopify store.</p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="feature_decp">
								<h3 class="title">WooCommerce Development</h3>
								<p>We can assist you in developing an ecommerce site that uses WooCommerce and WordPress as the backend. It will be cross browser and mobile compatible.</p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="feature_decp">
								<h3 class="title">PrestaShop Development</h3>
								<p>PrestaShop is one of the most powerful ecommerce platforms around. We can help you to develop a great looking online store using the PrestaShop platform. </p>
							</div>
						</div>
					</div>
				</div>
				<div class="custom_development_desp">
					<h2>And More ...</h2>
					<p>If you have additional requirements, that are not on this list, then simply contact us so that<br> we can start finding the right solution for your needs.</p>
					<?php 
                            echo $this->Html->link(
                            '<span>ORDER NOW</span>',
                                ['controller' => 'OrderNow', 'action' => 'index', '_full' => true],
                                    array('class'=>'btn yellow_btn','escape'=>false)
                                );
                            ?>
					
				</div>
				<!-- .special -->
				<div class="special_bg">
					<div class="special">
						<div class="details">
							<div class="special_icon">
                                                            <?php echo $this->Html->image('/assets/images/special_icon.png') ?>
                                                        </div>
							<div class="special_descp">
								<h3>Save UP TO <span>$753</span> Per/Order</h3>
								<p>We don’t charge our clients for js/jQuery works in projects. We offer almost $753 freebies for all of our clients. There is no hidden charge!</p>
							</div>
							<div class="clr"></div>
						</div>	
						<?php 
                                        echo $this->Html->link(
                                    'find out more',
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
				<div class="section_head">
					<h2>SOME SAMPLE WORKS</h2>
				</div>
				<div class="latest_projects">
					<ul class="project_block">
						<li>
							<div class="project no_left">
                                                            <?php echo $this->Html->image('/assets/images/wp_work9.png') ?>
								<div class="project_overlay">
									<h5>HEADSAPP</h5>
									<p>Custom Development</p>
									<a href="https://headsapp-tech.com/" class="btn overlay_btn" target="_blank"><span>visit site</span></a>
								</div>
							</div>							
						</li>
						<li>
							<div class="project">
                                                            <?php echo $this->Html->image('/assets/images/wp_work10.png') ?>
								<div class="project_overlay">
									<h5>PROISP</h5>
									<p>Custom Development</p>
									<a href="https://www.proisp.no/" class="btn overlay_btn" target="_blank"><span>visit site</span></a>
								</div>
							</div>							
						</li>
						<li>
							<div class="project">
                                                            <?php echo $this->Html->image('/assets/images/wp_work11.png') ?>
								<div class="project_overlay">
									<h5>Tech Wars</h5>
									<p>Custom Development</p>
									<a href="http://www.techwars.io/" class="btn overlay_btn" target="_blank"><span>visit site</span></a>
								</div>
							</div>							
						</li>
						<li>
							<div class="project no_right">
                                                            <?php echo $this->Html->image('/assets/images/wp_work12.png') ?>
								<div class="project_overlay">
									<h5>Do it Center</h5>
									<p>Custom Development</p>
									<a href="http://www.doitcenter.com.pa/" class="btn overlay_btn" target="_blank"><span>visit site</span></a>
								</div>
							</div>							
						</li>							
					</ul>
				</div>
			</div>
		</section><!-- / .work -->
		<!-- .get start -->
		<?php echo $this->element('header/getstart'); ?>
		<!-- /.get start -->
		
		<!-- .footer -->
                <?php echo $this->element('header/footer'); ?>
		<!-- /.footer -->
	</div>

</body>