<label for="lastName">Polise</label>
<div class="input-group mb-3">
    <select class="custom-select" id="inputGroupSelect02" name="policy" >
        <option value="">Alle</option>
        <?php foreach($policies as $key => $value):?>
        <option value="<?php echo $value['id']; ?>"><?php echo date("Y-m-d", strtotime($value['start_date']))." / ".date("Y-m-d", strtotime($value['end_date']))." - ".$value['policy_title']; ?></option>
        <?php endforeach; ?>
    </select>
    <div class="input-group-append">
        <label class="input-group-text" for="inputGroupSelect02">Options</label>
    </div>
</div>