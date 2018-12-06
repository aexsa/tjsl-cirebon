    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url('themes/adminpress/') ?>js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('themes/adminpress/') ?>js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('themes/adminpress/') ?>js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('themes/adminpress/') ?>js/custom.min.js"></script>
    <!-- toast -->
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/toast-master/js/jquery.toast.js"></script>
    <script src="<?php echo base_url('themes/adminpress/') ?>js/toastr.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    
    <!-- ============================================================== -->
    <!-- google 
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <!--data tables-->
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->

    <!-- ajaxonline -->
  <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>  -->

    <!-- ajax offline -->
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/ajax-2.5.0.min.js"></script>

    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<!-- untuk ajax page load -->
    <script type="text/javascript">
        $(document).ready(function() {
                           
        // var hash = window.location.hash.substr(1);
        // var href = $('#nav li a').each(function(){
        //     var href = $(this).attr('href');
        //     if(hash==href){
        //         var toLoad = hash+' #content';
        //         $('#content').load(toLoad)
        //     }                                           
        // });

        $('#nav li a').click(function(){    
            var toLoad = $(this).attr('href')+' #content';
            alert(toLoad);
            $('#content').hide('fast',loadContent);
            $('#load').remove();
            $('#wrapper').append('<span id="load">LOADING...</span>');
            $('#load').fadeIn('normal');
            // window.location.hash = $(this).attr('href').substr(40,$(this).attr('href').length-5);
            window.location.hash = $(this).attr('href');
            function loadContent() {
                $('#content').load(toLoad,'',showNewContent())
            }
            function showNewContent() {
                $('#content').show('normal',hideLoader());
            }
            function hideLoader() {
                $('#load').fadeOut('normal');
            }
            return false;
            
        });

    });
    </script>
</body>

</html>


    <?php echo Assets::js(); ?>

</body>

</html>
