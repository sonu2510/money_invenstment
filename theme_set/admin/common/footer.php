 </div>     
 <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="type keyword(s) here" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <!-- jquery vendor -->
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/jquery.min.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/jquery.nanoscroller.min.js"></script>
        <!-- nano scroller -->
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/menubar/sidebar.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/preloader/pace.min.js"></script>
        <!-- sidebar -->

        <!-- bootstrap -->

     <!--      <script src="<?php //echo HTTP_SERVER;?>assets/js/lib/data-table/buttons.dataTables.min.js"></script> -->

<!-- datatable -->
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/data-table/datatables.min.js"></script>
   
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/data-table/buttons.flash.min.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/data-table/jszip.min.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/data-table/pdfmake.min.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/data-table/vfs_fonts.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/data-table/buttons.html5.min.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/data-table/buttons.print.min.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/data-table/datatables-init.js"></script>



        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/weather/weather-init.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/circle-progress/circle-progress.min.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/circle-progress/circle-progress-init.js"></script>
  
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/sparklinechart/sparkline.init.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
        <script src="<?php echo HTTP_SERVER;?>assets/js/scripts.js"></script>
        <!-- scripit init-->
    </body>
<script type="text/javascript">
        function selecctall(n){//on click
            if($('#selectall_'+n).prop('checked')){
                
                $('.check_'+n).each(function() { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"               
                });
            }else{ 
                $('.check_'+n).each(function() { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                });         
            }
        }
   
</script>
</html>
