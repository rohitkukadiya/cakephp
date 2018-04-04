<div class="sticky_header">
    <div class="container">
        <!-- .header -->
        <header class="header">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar top"></span>
                        <span class="icon-bar mid"></span>
                        <span class="icon-bar bottom"></span>
                    </button>
                        <?php echo $this->Html->image('/assets/images/brand-logo.png',array(
                            "alt" => "PAD4HTML",
                            'url' => array('controller' => 'home', 'action' => 'index'),
                            'class'=>'navbar-brand'
                        ))?>
                    
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a href="#">Services</a>
                            <ul class="sub_menu">
                                <li>
                                    <?php 
                                        echo $this->Html->link(
                                            'PSD to HTML Conversion',
                                            ['controller' => 'PsdToHtml', 'action' => 'index', '_full' => true]
                                        );
                                    ?>
                                </li>
                                <li>
                                    <?php 
                                        echo $this->Html->link(
                                            'PSD to WordPress',
                                            ['controller' => 'PsdToWordpress', 'action' => 'index', '_full' => true]
                                        );
                                    ?>
                                </li>
                                <li>
                                    <?php 
                                        echo $this->Html->link(
                                            'PSD to email',
                                            ['controller' => 'PsdToEmail', 'action' => 'index', '_full' => true]
                                        );
                                    ?>
                                </li>
                                <li>
                                    <?php 
                                        echo $this->Html->link(
                                            'Custom Development',
                                            ['controller' => 'CustomDevelopment', 'action' => 'index', '_full' => true]
                                        );
                                    ?>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?php 
                                        echo $this->Html->link(
                                            'samples',
                                            ['controller' => 'Samples', 'action' => 'index', '_full' => true]
                                        );
                                    ?>
                        </li>
                        <li>
                            <?php 
                                        echo $this->Html->link(
                                            'About',
                                            ['controller' => 'AboutUs', 'action' => 'index', '_full' => true]
                                        );
                                    ?>
                            </li>
                        <li>
                            <?php 
                                        echo $this->Html->link(
                                            'For agencies',
                                            ['controller' => 'about', 'action' => 'index', '_full' => true]
                                        );
                                    ?>
                        </li>
                        <li>
                            <?php 
                                        echo $this->Html->link(
                                            'request a quote',
                                            ['controller' => 'quote', 'action' => 'index', '_full' => true]
                                        );
                                    ?></li>
                        <li class="get_started"><a href="#" class="btn yellow_btn"><span>Get Started</span></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </header><!-- /.header -->
    </div>
</div>
