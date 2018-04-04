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
<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 8250001;
(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69879536-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- End of LiveChat code -->