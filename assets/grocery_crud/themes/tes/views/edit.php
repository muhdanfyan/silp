<?php
	$this->set_css($this->default_theme_path.'/tablestrap/css/bootstrap.min.css');
	$this->set_css($this->default_theme_path.'/tablestrap/css/bootstrap-theme.min.css');
	$this->set_css($this->default_theme_path.'/tablestrap/css/datatables.css');
    $this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.form.min.js');
	$this->set_js_config($this->default_theme_path.'/tablestrap/js/datatables-edit.js');
	$this->set_css($this->default_css_path.'/ui/simple/'.grocery_CRUD::JQUERY_UI_CSS);
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/ui/'.grocery_CRUD::JQUERY_UI_JS);

	$this->set_css($this->default_theme_path.'/tablestrap/css/pnotify.custom.min.css');
	$this->set_js($this->default_theme_path.'/tablestrap/js/pnotify.custom.min.js');
?>

<style>
	.form-control{
		max-width: 500px !important;
	}

	.ui-button{
		margin-top: 5px;
	}
</style>
<div class="row justify-content-center">
    <div class="col-lg-10 col-md-10">
    <div class="card">
            <div class="card-header">
                <h2><?php echo $this->l('list_record'); ?> <?php echo $subject?></h2>
            </div>
            <div class="list-group list-group-flush">


            <?php echo form_open( $update_url, 'method="post" id="crudForm" enctype="multipart/form-data"'); ?>


                    <div id='report-error' class='report-div error'></div>
                    <div id='report-success' class='report-div success'></div>
                    <?php foreach ($fields as $field){ ?>
                        <li class="list-group-item">
                        <div class="form-group row mb-3" id="<?php echo $field->field_name; ?>_field_box">
                            <label for="<?php echo $field->field_name; ?>_display_as_box" class="col-3 col-form-label" id="<?php echo $field->field_name; ?>_display_as_box">
                                <?php echo $input_fields[$field->field_name]->display_as . 
                                ($input_fields[$field->field_name]->required ? "*" : ""); ?>
                            </label>
                            <div class="col-9" id="<?php echo $field->field_name; ?>_input_box">
                            <?php echo $input_fields[$field->field_name]->input?>
                            </div>
                        </div>
                        </li>
                    
                    <?php } ?>

                    
                    <!-- Start of hidden inputs -->
                    <?php
                        foreach($hidden_fields as $hidden_field){
                            echo $hidden_field->input;
                        }
                    ?>
                    <!-- End of hidden inputs -->
                    <?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>

                    <div class="card-footer">
                        <!-- <input id="form-button-save" type='submit' value='<?php echo $this->l('form_save'); ?>' class='btn btn-success'/> -->
                        <?php if(!$this->unset_back_to_list) { ?>
                            <!-- <input type='button' value='<?php echo $this->l('form_save_and_go_back'); ?>' class='btn btn-success' id="save-and-go-back-button"/>
                            <input type='button' value='<?php echo $this->l('form_cancel'); ?>' class='btn btn-warning' id="cancel-button" /> -->
                            <button type="button" class="btn btn-success waves-effect waves-light" id="save-and-go-back-button">
                                <span class="btn-label">
                                    <i class="mdi mdi-content-save"></i>
                                </span>
                                <?php echo $this->l('form_save_and_go_back'); ?>
                            </button>
                            <button type="button" class="btn btn-warning waves-effect waves-light" id="cancel-button" >
                                <span class="btn-label">
                                    <i class="mdi mdi-keyboard-return"></i>
                                </span>
                                <?php echo $this->l('form_cancel'); ?>
                            </button>
                        <?php }?>
                        <div class='small-loading' id='FormLoading'><?php echo $this->l('form_update_loading'); ?></div>
                    </div>

                <?php echo form_close(); ?>


            </div>  <!-- end card-body -->
        </div>

    </div>
</div>

    
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_edit_form = "<?php echo $this->l('alert_edit_form')?>";
	var message_update_error = "<?php echo $this->l('update_error')?>";
	var message_loading = "<?php echo $this->l('form_update_loading'); ?>";
</script>