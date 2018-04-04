<body class="checkout_page">
	<div class="page_wrap">
		<?php echo $this->element('header/header'); ?>
                <?= $this->Flash->render() ?>
		<!-- .checkout -->
		<section class="checkout">
			<div class="container">
				<div class="wrap">
					<div class="section_head after">
						<h2>Checkout</h2>
					</div>
					<div class="descp">
						<h4>Order Summary</h4>
                                                <?php 
                                                $order_value = array();
                                                foreach ($order as $key => $value) {
                                                    $order_value[0] = $value;
                                                }
                                                $payable_amount = $order_value[0]['final_price'] * 10 / 100;
                                                //pr($order_value); exit;
                                                ?>
						<ul class="first">
							<li><span class="left">Order ID</span><span class="right"><?php echo $order_value[0]['order_id']; ?></span></li>
							<li><span class="left">Total price</span><span class="right"><?php echo "$".$order_value[0]['final_price']; ?></span></li>
							<li><span class="left">Turnaround</span><span class="right"><?php echo $order_value[0]['turnaround_time']; ?></span></li>
                                                        <li><span class="left">Pay now</span><span class="right"><?php echo "$".$payable_amount; ?></span></li>
						</ul>
					</div>
					<div class="descp pad_top">
						<h4>Payment Method</h4>
						<ul class="second">
							<li>
								<div class="checkbox c_radio check">
									<label><input type="radio" class="pretty_checkable" name="1" value="0" checked>Pay Pal</label>
								</div>
								<!--div class="checkbox c_radio">
									<label><input type="radio" class="pretty_checkable" name="1" value="1">Credit Card</label>
								</div-->
							</li>
						</ul>
					</div>
					<div class="pay_now">
						<!--<a href="#" class="btn yellow_btn"><span>pay now</span></a>-->
                                            <?php echo $this->Form->create(null, ['url' => ['controller' => 'OrderNow', 'action' => 'process','checkout']]); ?>
                                            <input type="hidden" name="itemname" value="<?php echo $order_value[0]['project_type']; ?>" /> 
                                                <input type="hidden" name="itemnumber" value="<?php echo $order_value[0]['order_id']; ?>" /> 
                                                <input type="hidden" name="itemprice" value="<?php echo $payable_amount; ?>" />
                                                <input type="hidden" name="itemdesc" value="PSD4HTML" /> 
                                                <select style="display: none;" name="itemQty"><option value="1">1</option><option value="1">2</option><option value="3">3</option></select> 
                                                <!--<input class="dw_button" type="submit" name="submitbutt" value="Buy (225.00 USD)" />-->
                                                <input alt="Pay via PayPal Standard" src="http://p4h.1and1team.com/assets/images/paypal_btn.png" type="image">
                                            <?php echo $this->Form->end(); ?> 
					</div>
				</div>
			</div>
		</section><!-- /.checkout -->		
		
		<!-- .footer -->
                <?php echo $this->element('header/footer'); ?>
		<!-- /.footer -->
	</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
</body>