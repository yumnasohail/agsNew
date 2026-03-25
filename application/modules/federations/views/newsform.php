<style>
  table tbody tr td{
    width:50%;
  }
</style>
<main>
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <h1 class="color-theme-1">Federasjoner</h1>
              <a class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block btn-right" href="<?php echo ADMIN_BASE_URL . 'federations'; ?>">&nbsp;&nbsp;&nbsp;Back</a> 
              <div class="separator mb-5"></div>
          </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-12 col-lg-12 col-12 mb-4">
            <div class="card">
            <div class="card-body">
                <h5 class="mb-4"></h5>
                <?php
                $attributes = array('autocomplete' => 'off', 'id' => 'form_sample_1', 'class' => 'form-horizontal');
                if (empty($update_id)) {
                    $update_id = 0;
                } else {
                    $hidden = array('hdnId' => $update_id, 'hdnActive' => $news['status']);
                }
                if (isset($hidden) && !empty($hidden))
                    echo form_open_multipart(ADMIN_BASE_URL . 'federations/submit/' . $update_id, $attributes, $hidden);
                else
                    echo form_open_multipart(ADMIN_BASE_URL . 'federations/submit/' . $update_id, $attributes);
                ?>

                  <div class="form-body section-box">
                    <div class="row">

                        <div class="col-sm-6 col-md-6 form-group position-relative error-l-50">
                            <?php
                            $data = array(
                                'name' => 'name',
                                'id'   => 'name',
                                'class'=> 'form-control',
                                'value'=> $news['name'],
                                'type' => 'text',
                                'required' => 'required'
                            );
                            ?>
                            <label>Navn</label>
                            <?php echo form_input($data); ?>
                        </div>

                        <div class="col-sm-6 col-md-6 form-group position-relative error-l-50">
                            <?php
                            $data = array(
                                'name' => 'title',
                                'id'   => 'title',
                                'class'=> 'form-control',
                                'value'=> $news['title'],
                                'type' => 'text',
                                'required' => 'required'
                            );
                            ?>
                            <label>kort Tittel</label>
                            <?php echo form_input($data); ?>
                            <small class="form-text text-muted">If you have any short name of federation else just write the same.</small>
                        </div>

                        <div class="col-sm-6 col-md-6 form-group position-relative error-l-50">
                            <?php
                            $data = array(
                                'name' => 'sanction_name',
                                'id'   => 'sanction_name',
                                'class'=> 'form-control',
                                'value'=> $news['sanction_name'],
                                'type' => 'text',
                                'required' => 'required'
                            );
                            ?>
                            <label>
                                Sanction Name
                                <span id="sanction_check_badge" class="badge ml-2" style="display:none; font-size:12px;"></span>
                            </label>
                            <?php echo form_input($data); ?>

                            <!-- Sanction check result box -->
                            <div id="sanction_result_box" style="display:none; margin-top:8px; padding:10px 14px; border-radius:6px; font-size:13px;"></div>
                        </div>

                    </div>
                  </div>

                  <div class="form-actions fluid no-mrg">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="col-md-offset-2 col-md-9" style="padding-bottom:15px;">
                          <span style="margin-left:40px"></span>
                          <button class="btn btn-outline-primary" type="submit" id="btn_submit">
                            <i class="fa fa-check"></i>&nbsp;Save
                          </button>
                          <a href="<?php echo ADMIN_BASE_URL . 'federations'; ?>">
                            <button type="button" class="btn btn-outline-primary" style="margin-left:20px;">
                              <i class="fa fa-undo"></i>&nbsp;Cancel
                            </button>
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                    </div>
                  </div>

                <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
  </div>
</main>

<!-- ═══════════════════════════════════════════════
     SANCTION WARNING MODAL
════════════════════════════════════════════════ -->
<div class="modal fade" id="sanctionModal" tabindex="-1" role="dialog" aria-labelledby="sanctionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border: 2px solid #e74c3c;">
      <div class="modal-header" style="background:#e74c3c; color:white;">
        <h5 class="modal-title" id="sanctionModalLabel">
          <i class="fa fa-exclamation-triangle"></i>&nbsp; Sanction Warning
        </h5>
      </div>
      <div class="modal-body">
        <p style="font-size:15px;">
          The name <strong id="modal_sanction_name"></strong> was found on a <strong>sanctions list</strong>.
        </p>
        <div id="modal_match_detail" style="background:#fdf3f3; border:1px solid #f5c6cb; border-radius:6px; padding:10px; margin-bottom:10px; font-size:13px;"></div>
        <p style="color:#c0392b; font-weight:600;">Do you still want to add this federation?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="btn_force_submit">
          <i class="fa fa-check"></i>&nbsp; Yes, Add Anyway
        </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <i class="fa fa-times"></i>&nbsp; Cancel
        </button>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     JAVASCRIPT
════════════════════════════════════════════════ -->
<script>
$(document).ready(function () {

    // ── 1. Auto-fill sanction_name from name field ──────────────────
    $('#name').on('input', function () {
        var nameVal = $(this).val().trim();
        var sanctionField = $('#sanction_name');

        // Only auto-fill if user hasn't manually edited sanction_name
        if (!sanctionField.data('manually-edited')) {
            sanctionField.val(nameVal);
        }

        // Clear previous result when name changes
        resetSanctionUI();
    });

    // Mark sanction_name as manually edited if user types in it directly
    $('#sanction_name').on('input', function () {
        var nameVal   = $('#name').val().trim();
        var sanctionVal = $(this).val().trim();
        // If user changed it to something different from the name field, flag it
        if (sanctionVal !== nameVal) {
            $(this).data('manually-edited', true);
        } else {
            $(this).data('manually-edited', false);
        }
        resetSanctionUI();
    });

    // ── 2. Intercept form submit ────────────────────────────────────
    var forceSubmit = false; // flag set when user confirms despite sanction hit

    $('#form_sample_1').on('submit', function (e) {

        if (forceSubmit) {
            // User already confirmed — allow form to submit normally
            return true;
        }

        e.preventDefault();

        var sanctionName = $('#sanction_name').val().trim();

        if (sanctionName === '') {
            alert('Please enter a Sanction Name before saving.');
            return false;
        }

        runSanctionCheck(sanctionName, function (result) {

            if (result.res === 'Secure' || result.res === 'false_positive') {
                // Clean — submit immediately
                forceSubmit = true;
                $('#form_sample_1').submit();

            } else if (result.res === 'Not secure') {
                // Show warning modal with match details
                showSanctionModal(sanctionName, result);

            } else {
                // API error — ask user what to do
                if (confirm('Sanction check could not be completed (' + result.res + ').\nDo you want to save anyway?')) {
                    forceSubmit = true;
                    $('#form_sample_1').submit();
                }
            }
        });
    });

    // ── 3. Force submit from modal ──────────────────────────────────
    $('#btn_force_submit').on('click', function () {
        $('#sanctionModal').modal('hide');
        forceSubmit = true;
        $('#form_sample_1').submit();
    });

    // ── 4. Sanction check AJAX call ─────────────────────────────────
    function runSanctionCheck(name, callback) {
        setBadge('checking');
        $('#sanction_result_box').hide();

        $.ajax({
            url: '<?php echo ADMIN_BASE_URL; ?>federations/sanction_check_ajax',
            type: 'POST',
            data: { name: name },
            dataType: 'json',
            timeout: 15000,
            success: function (response) {
                showInlineResult(response);
                callback(response);
            },
            error: function (xhr, status) {
                var errResult = { res: 'Request failed', description: status };
                showInlineResult(errResult);
                callback(errResult);
            }
        });
    }

    // ── 5. Show inline result under the field ──────────────────────
    function showInlineResult(result) {
        var box = $('#sanction_result_box');
        box.removeClass('alert-success alert-danger alert-warning');

        if (result.res === 'Secure' || result.res === 'false_positive') {
            setBadge('secure');
            box.addClass('alert alert-success')
               .html('<i class="fa fa-check-circle"></i> <strong>Secure</strong> — No sanctions matches found.')
               .show();
        } else if (result.res === 'Not secure') {
            setBadge('not_secure');
            var matchName = '';
            if (result.description && result.description[0]) {
                matchName = result.description[0].name || '';
            }
            box.addClass('alert alert-danger')
               .html('<i class="fa fa-exclamation-triangle"></i> <strong>Sanctioned entity found</strong>' + (matchName ? ': ' + matchName : '') + '. You will be asked to confirm.')
               .show();
        } else {
            setBadge('error');
            box.addClass('alert alert-warning')
               .html('<i class="fa fa-warning"></i> <strong>Check failed:</strong> ' + result.res)
               .show();
        }
    }

    // ── 6. Badge next to label ──────────────────────────────────────
    function setBadge(status) {
        var badge = $('#sanction_check_badge');
        badge.removeClass('badge-secondary badge-success badge-danger badge-warning');

        var map = {
            checking:  { cls: 'badge-secondary', text: '⏳ Checking...' },
            secure:    { cls: 'badge-success',   text: '✔ Secure' },
            not_secure:{ cls: 'badge-danger',     text: '✘ Sanctioned' },
            error:     { cls: 'badge-warning',    text: '⚠ Check Failed' },
        };

        if (map[status]) {
            badge.addClass(map[status].cls).text(map[status].text).show();
        }
    }

    // ── 7. Sanction warning modal ───────────────────────────────────
    function showSanctionModal(name, result) {
        $('#modal_sanction_name').text(name);

        var detail = '';
        if (result.description && result.description.length > 0) {
            var hit = result.description[0];
            detail += '<strong>Matched Entity:</strong> ' + (hit.name || 'N/A') + '<br>';
            if (hit.entity_type)       detail += '<strong>Type:</strong> ' + hit.entity_type + '<br>';
            if (hit.country_residence) detail += '<strong>Country:</strong> ' + (hit.country_residence[0] || '') + '<br>';
            if (hit.data_source)       detail += '<strong>List:</strong> ' + (hit.data_source.name || '') + '<br>';
            if (hit.start_date)        detail += '<strong>Sanctioned Since:</strong> ' + hit.start_date + '<br>';
            if (hit._similarity)       detail += '<strong>Name Similarity:</strong> ' + hit._similarity + '%<br>';
        }

        $('#modal_match_detail').html(detail || 'Match details unavailable.');
        $('#sanctionModal').modal('show');
    }

    // ── 8. Reset UI helpers ─────────────────────────────────────────
    function resetSanctionUI() {
        $('#sanction_check_badge').hide();
        $('#sanction_result_box').hide();
    }

});
</script>