



    <footer class="page-footer">
        <div class="footer-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <p class="mb-0 text-muted">AGS 2019</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


		<div class="modal fade" id="password_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">
							Change&nbsp;
							<?php
								echo ucfirst(ucfirst(preg_replace('/[^a-zA-Z0-9]+/', ' ', $this->uri->segment(2))));
							?>
							&nbsp;Password
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								&times;
							</span>
						</button>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary submit_password">
							Submit
						</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							Close
						</button>
					</div>
				</div>
			</div>
		</div>
			<div class="modal fade" id="detail_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">
							<?php
								echo ucfirst(ucfirst(preg_replace('/[^a-zA-Z0-9]+/', ' ', $this->uri->segment(2))));
							?>&nbsp;Details
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								&times;
							</span>
						</button>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							Close
						</button>
					</div>
				</div>
			</div>
		</div>
		<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<h4 id="myModalLabel" class="modal-title">Details</h4>
				<button type="button" data-dismiss="modal" aria-label="Close" class="close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<ul class="list-group">
						<li class="list-group-item"><b>Description:</b> John Doe</li>
					
					</ul>
				</div>
				<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-default btn-outline-primary">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div id="myModal_log" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<h4 id="myModalLabel" class="modal-title">Details</h4>
				<button type="button" data-dismiss="modal" aria-label="Close" class="close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
				    <div class="text_here" style="width:100%;"></div>
				</div>
				<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-default btn-outline-primary">Close</button>
				</div>
			</div>
		</div>
	</div>
	</body>


	<script>

	$(document).ready(function(){
		claim_count();
		function claim_count()
		{
			$.ajax({
				type: 'POST',
				url: "<?= BASE_URL ?>template/get_new_claims",
				data: {},
				async: false,
				success: function(result){
					if(result >0){
						$('.btn-claim-count').removeClass('hide');
						$('.count-claim').text(result);
					}
				}
			});
		}
	interval();
	function interval(){
			i = setInterval(function(){
				claim_count();
			},10000);   
		}
		
	});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	<script src="<?=STATIC_ADMIN_JS?>vendor/moment.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/fullcalendar.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/datatables.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/perfect-scrollbar.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/progressbar.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/jquery.barrating.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/select2.full.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/nouislider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/Sortable.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/mousetrap.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/glide.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>toastr.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>sweetalert.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/select2.full.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/bootstrap-notify.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/dropzone.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/bootstrap-tagsinput.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/nouislider.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/cropper.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/typeahead.bundle.js"></script>
	<script src="<?=STATIC_ADMIN_JS?>dore-plugins/select.from.library.js"></script>
	<script src="<?=STATIC_ADMIN_JS?>tinymce/tinymce.min.js"></script>
	<script src="<?=STATIC_ADMIN_JS?>vendor/Chart.bundle.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/chartjs-plugin-datalabels.js"></script>
	<script src="<?=STATIC_ADMIN_JS?>dore.script.js"></script>
	<script src="<?=STATIC_ADMIN_JS?>scripts.js"></script>

    <script>
        	function toaster_success_setting() {
				toastr.options = {
					"closeButton": true,
					"debug": false,
					"newestOnTop": true,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
					};
			}
			tinymce.init({
					theme: 'advanced',
					resize: false,
					fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
					selector: "textarea.ckeditor",
					protect: [
							/\<\/?(if|endif)\>/g,  // Protect <if> & </endif>
							/\<xsl\:[^>]+\>/g,  // Protect <xsl:...>
							/<\?php.*?\?>/g  // Protect php code
						],
					theme: "modern",
					width: '100%',
					height: 500,
					element_format : 'html',
					autoresize_min_height: 500,
					autoresize_max_height: 800,
					plugins: [
						"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
						"searchreplace wordcount visualblocks code fullscreen visualchars insertdatetime media nonbreaking",
						"table contextmenu directionality emoticons paste textcolor responsivefilemanager autoresize"
					],
					codesample_languages: [
						{text: 'HTML/XML', value: 'markup'},
						{text: 'JavaScript', value: 'javascript'},
						{text: 'CSS', value: 'css'},
						{text: 'PHP', value: 'php'}
					],
					toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent  | fontselect |  fontsizeselect ",
					toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | styleselect ",
					image_advtab: true,
					external_filemanager_path: "<?= BASE_URL ?>/filemanager/",
					filemanager_title: "filemanager",
					external_plugins: {
						"filemanager": "<?= BASE_URL ?>filemanager/plugin.min.js"
					}
				});
				var request = null;
	var policySearchBarDropDown = '.policySearchBarDropDown';
	var policySearchBar = '#policySearchBar';
	var previousSearchIcon = $(policySearchBar).find('.search-icon').html();
	$(".policySearchBarInput").on("keyup", function(event) {
		var search = $(this).val();
		var thiss = $(this);
		var dropDownDiv = thiss.parent().parent().find(policySearchBarDropDown);
		$(policySearchBar).find('.search-icon').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
		setTimeout(function() {
			request = $.ajax({
				type: 'post',
				url: "<?php echo ADMIN_BASE_URL ?>claims/searchPolicyNumber",
				data: {
					'search': search
				},
				beforeSend: function() {
					if (request != null) {
						request.abort();
					}
				},
				async: false,
				success: function(result) {
					dropDownDiv.addClass('show');
					dropDownDiv.html(result);
					$(policySearchBar).find('.search-icon').html(previousSearchIcon);
				}
			});
		}, 100);
	});
	var ignoreClickOnMeElement = document.getElementById('policySearchBarDropDown');
	var ignoreClickOnSearhcElement = document.getElementById('policySearchBar');
	document.addEventListener('click', function(event) {
		var isClickInsideElement = ignoreClickOnMeElement.contains(event.target);
		var isClickSearchElement = ignoreClickOnSearhcElement.contains(event.target);
		if (!isClickSearchElement) {
			if (!isClickInsideElement)
				$(policySearchBarDropDown).removeClass('show');
		} else if (isClickSearchElement) {
			if (!$(policySearchBarDropDown).hasClass('show') && $.trim($(policySearchBarDropDown).html()).length > 0) {
				$(policySearchBarDropDown).addClass('show');
			}
		}
	});
	</script>
	
</body>

</html>