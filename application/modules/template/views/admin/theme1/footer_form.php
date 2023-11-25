    <!-- Page footer form-->
    <footer><span>&copy; 2020 - Flexfit</span>
        <!-- <p class="copy-right">Design and Developed by :<span class="theme-color"><a href="https://hwryk.com" target="_blank">Hello World Technologies</a></span></p> -->
    </footer>
    </div><!-- wrapper div ends here -->
    
   <!-- MODERNIZR-->
   <script src="<?php echo STATIC_ADMIN_JS?>modernizr.js"></script>

       <!-- ===================== Toastr ========================= -->
    <script src="<?php echo STATIC_ADMIN_JS?>toastr.js"></script>

      <!-- MOMENT JS-->
   <script src="<?php echo STATIC_ADMIN_JS?>moment/min/moment-with-locales.min.js"></script>

   <!-- BOOTSTRAP-->
   <script src="<?php echo STATIC_ADMIN_JS?>bootstrap.js"></script>

   <!-- BOOTSTRAP FILEUPLOAD-->
   <script src="<?php echo STATIC_ADMIN_JS?>bootstrap-fileupload.js"></script>

   <!-- STORAGE API-->
   <script src="<?php echo STATIC_ADMIN_JS?>jquery.storageapi.js"></script>

   <!-- JQUERY EASING-->
   <script src="<?php echo STATIC_ADMIN_JS?>jquery.easing.js"></script>

   <!-- ANIMO-->
   <script src="<?php echo STATIC_ADMIN_JS?>animo.js"></script>

   <!-- SLIMSCROLL-->
   <script src="<?php echo STATIC_ADMIN_JS?>jquery.slimscroll.min.js"></script>

   <!-- SCREENFULL-->
   <script src="<?php echo STATIC_ADMIN_JS?>screenfull.js"></script>

   <!-- LOCALIZE-->
   <script src="<?php echo STATIC_ADMIN_JS?>jquery.localize.js"></script>
   
   <!-- CALANDER-->
   <script src="<?php echo STATIC_ADMIN_JS?>bootstrap-datetimepicker.min.js"></script>

   <!-- RTL demo-->
   <script src="<?php echo STATIC_ADMIN_JS?>demo-rtl.js"></script>

   <!-- PARSLEY FORM VALIDATION-->
   <script src="<?php echo STATIC_ADMIN_JS?>parsley.min.js"></script>
   
   <!-- SWEET ALERT-->
    <script src="<?php echo STATIC_ADMIN_JS?>sweetalert.min.js"></script>

  <script src="<?php echo STATIC_ADMIN_JS?>tinymce/tinymce.min.js"></script> 

   <!-- Demo-->
   <script src="<?php echo STATIC_ADMIN_JS?>demo-forms.js"></script>

  <!-- chosen multi select -->
  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/0.9.11/chosen.jquery.min.js"></script>
  <!-- <script src="<?php echo STATIC_ADMIN_JS?>chosen.jquery.min.js"></script>-->


   <!-- =============== APP SCRIPTS ===============-->
   <script src="<?php echo STATIC_ADMIN_JS?>app.js"></script>

	<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                  <span aria-hidden="true">&times;</span>
               </button>
               <h4 id="myModalLabel" class="modal-title">Details</h4>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item"><b>Description:</b> John Doe</li>
                   
                </ul>
            </div>
            <div class="modal-footer">
               <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
            </div>
         </div>
      </div>
   </div>
</body>

<script type="text/javascript">
       tinymce.init({
          theme : 'advanced',
           resize: false,
           fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
    selector: "textarea.ckeditor",theme: "modern",width: '100%',height: 500,
    autoresize_min_height: 500,
    autoresize_max_height: 800,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks code fullscreen visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager autoresize"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent  | fontselect |  fontsizeselect ",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | styleselect ",
   image_advtab: true ,

   
   external_filemanager_path:"<?=BASE_URL?>/filemanager/",
   filemanager_title:"filemanager" ,
   external_plugins: { "filemanager" : "<?=BASE_URL?>filemanager/plugin.min.js"}
 });
     
   

<?php 
$arrDate = $this->config->item('Date_Format_Type_JS');
$arrTime = $this->config->item('time_Format_Type_JS');
 ?>

    $('#datetimepicker1').datetimepicker({
      icons: {
          time: 'fa fa-clock-o',
          date: 'fa fa-calendar',
          up: 'fa fa-chevron-up',
          down: 'fa fa-chevron-down',
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-crosshairs',
          clear: 'fa fa-trash'
        },
        //viewMode: 'years',
        format: '<?=$arrDate[DEFAULT_DATE_FORMAT]?>'
    });

     $('.datetimepicker2').datetimepicker({
      icons: {
          time: 'fa fa-clock-o',
          date: 'fa fa-calendar',
          up: 'fa fa-chevron-up',
          down: 'fa fa-chevron-down',
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-crosshairs',
          clear: 'fa fa-trash'
        },
        //viewMode: 'years',
        format: '<?=$arrDate[DEFAULT_DATE_FORMAT]?>'
    });

     $('.datetimepicker3').datetimepicker({
      icons: {
          time: 'fa fa-clock-o',
          date: 'fa fa-calendar',
          up: 'fa fa-chevron-up',
          down: 'fa fa-chevron-down',
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-crosshairs',
          clear: 'fa fa-trash'
        },
       format: '<?=$arrDate[DEFAULT_DATE_FORMAT]?> <?=$arrTime[DEFAULT_TIME_FORMAT]?>'
    });

       // only time
    $('.datetimepicker4').datetimepicker({
        format: 'HH:mm',
    });




  

$('.chosen-select').chosen();
 
       
</script>
