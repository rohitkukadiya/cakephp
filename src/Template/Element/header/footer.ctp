<footer class="footer">
    <div class="container">
        <ul class="footer_links">
            <li>
                <?php 
                                        echo $this->Html->link(
                                            'Terms of service',
                                            ['controller' => 'TermsAndConditions', 'action' => 'index', '_full' => true]
                                        );
                                    ?>
                </li>
            <li>
                 <?php 
                    echo $this->Html->link(
                        'Manifesto',
                        ['controller' => 'manifesto', 'action' => 'index', '_full' => true]
                    );
                ?>
            <li>
                <?php 
                    echo $this->Html->link(
                        'privacy policy',
                        ['controller' => 'privacy-policy', 'action' => 'index', '_full' => true]
                    );
                ?>
                </li>
            <li>
                <?php 
                    echo $this->Html->link(
                        'faq',
                        ['controller' => 'faq', 'action' => 'index', '_full' => true]
                    );
                ?></li>
            <li>
                <?php 
                    echo $this->Html->link(
                        'Contact',
                        ['controller' => 'contact', 'action' => 'index', '_full' => true]
                    );
                ?></li>
        </ul>				
        <div class="copyright_section">
            <p>&copy; copyright 2016 psd4html, all rights reserved</p>
            <div class="social_links">
                <a href="#"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-linkedin fa-fw" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-google-plus fa-fw" aria-hidden="true"></i></a>
            </div>
            <div class="clr"></div>
        </div>
    </div>			
</footer>