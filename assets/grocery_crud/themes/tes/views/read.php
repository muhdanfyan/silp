<?php $this->set_css($this->default_theme_path.'/tablestrap/css/bootstrap.min.css');?>
<?php $this->set_css($this->default_theme_path.'/tablestrap/css/bootstrap-theme.min.css');?>

<div class="row justify-content-center">

<div class="col-lg-6 col-md-8">


    <div class="card">
        <!-- <div class="card-header">
            <h3 class="panel-title"><?php echo $this->l('list_record'); ?> <?php echo $subject?></h3>
        </div> -->

        <!-- Start of hidden inputs -->
            <?php
                foreach($hidden_fields as $hidden_field){
                    echo $hidden_field->input;
                }
            ?>
        <!-- End of hidden inputs -->
        <?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
        <div class='line-1px'></div>
        <div id='report-error' class='report-div error'></div>
        <div id='report-success' class='report-div success'></div>
        <!-- 
        <div class="card-box">

            <h3 class="mb-3 mt-4 text-uppercase bg-light p-2">
                <i class="mdi mdi-account-circle mr-1"></i>
                <?php echo $this->l('list_record'); ?>
                <?php echo $subject?>
            </h3>
            <div class="">
                <h4 class="font-13 text-muted text-uppercase">About Me :</h4>
                <p class="mb-3">
                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                    1500s, when an unknown printer took a galley of type.
                </p>

                <h4 class="font-13 text-muted text-uppercase mb-1">Date of Birth :</h4>
                <p class="mb-3"> March 23, 1984 (34 Years)</p>

                <h4 class="font-13 text-muted text-uppercase mb-1">Company :</h4>
                <p class="mb-3">Vine Corporation</p>

                <h4 class="font-13 text-muted text-uppercase mb-1">Added :</h4>
                <p class="mb-3"> April 22, 2016</p>

                <h4 class="font-13 text-muted text-uppercase mb-1">Updated :</h4>
                <p class="mb-0"> Dec 13, 2017</p>

            </div>

        </div> -->

        <ul class="list-group list-group-flush">
            <h3 class="mb-3 mt-4 text-uppercase bg-light p-2">
                <i class="mdi mdi-account-circle mr-1"></i>
                <?php echo $this->l('list_record'); ?>
                <?php echo $subject?>
            </h3>
                <?php foreach ($fields as $field){ ?>
                    <li class="list-group-item" style="padding-left:5%">
                        <h3 class="font-13 text-muted text-uppercase" id="<?php echo $field->field_name; ?>_field_box">
                            <?php echo $input_fields[$field->field_name]->display_as . 
                            ($input_fields[$field->field_name]->required ? "*" : ""); ?>
                        </h3>
                        <p class="mb-3">
                            <?php echo $input_fields[$field->field_name]->input?>
                        </p>
                    </li>
                    <!-- <tr class='form-field-box' id="<?php echo $field->field_name; ?>_field_box">
                        <th class='form-display-as-box' style="width:25% !important;" id="<?php echo $field->field_name; ?>_display_as_box">
                            <?php echo $input_fields[$field->field_name]->display_as . 
                            ($input_fields[$field->field_name]->required ? "*" : ""); ?>
                        </th>
                        <td class='form-input-box' id="<?php echo $field->field_name; ?>_input_box">
                            <?php echo $input_fields[$field->field_name]->input?>
                        </td>
                    </tr> -->
                <?php } ?>
        </ul>
        <div class="card-footer">
            <a href="<?php echo $list_url?>" class="btn btn-success">
                <?php echo $this->l('form_back_to_list'); ?>
            </a>
        </div>
    </div>

</div>


</div>
