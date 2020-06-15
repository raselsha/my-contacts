<!-- CONTENT-WRAPPER SECTION END-->
   
    <div class="container">
         <footer>
            <div class="row">
                <div class="col-md-12">
                    <span class="pull-left">Copyright
                        &copy; <?php echo date('Y'); ?> All rights reserved  | A project By : <a href="http://www.shahadat.website/" target="_blank">Shahadat Hossain</a>
                    </span> 
                    <span class="pull-right">
                        version 1.0
                    </span>
                </div>
            </div>
        </footer>
    </div>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?php echo base_url(); ?>theme/frontend/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url(); ?>theme/frontend/js/bootstrap.js"></script>
    <!-- Menu active SCRIPTS  -->
    <script type="text/javascript">
        $(function() {
             var url = window.location;
            $('ul.nav a[href="'+ url +'"]').parent().addClass('active');

        });
       
    </script>
</body>
</html>
