
        <section class="get_start">
            <div class="container">
                <div class="section_head">
                    <h2>Ready to Get Started?</h2>
                    <p>We start most projects within 24 hours. You can get an estimate right now.</p>				
                </div>
                <?php 
                            echo $this->Html->link(
                            '<span> Order Now</span>',
                                ['controller' => 'OrderNow', 'action' => 'index', '_full' => true],
                                    array('class'=>'btn border_btn section_btn','escape'=>false)
                                );
                            ?>
            </div>			
        </section>