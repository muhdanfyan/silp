<div class="row justify-content-center" style="margin-top:50px">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo lang('change_password_heading');?></h4>

                <div id="infoMessage"><?php echo $message;?></div>

                <?php echo form_open("auth/change_password");?>

                    <div class="form-group">
                        <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
                        <?php echo form_input($old_password, '' ,array('class'=>'form-control', 'placeholder'=>'Password Lama'));?>
                        <small class="form-text text-muted">Input Password Sebelumnya</small>
                    </div>

                    <div class="form-group">
                        <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
                        <?php echo form_input($new_password, '' ,array('class'=>'form-control', 'placeholder'=>'Password Baru'));?>
                    </div>

                    <div class="form-group">
                        <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                        <?php echo form_input($new_password_confirm, '' ,array('class'=>'form-control', 'placeholder'=>'Konfirm Password'));?>
                    </div>

                    <?php echo form_input($user_id);?>
                    <!-- <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p> -->
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Change</button>

                <?php echo form_close();?>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->

</div>
<!-- 
<h1><?php echo lang('change_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/change_password");?>

      <p>
            <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
            <?php echo form_input($old_password);?>
      </p>

      <p>
            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
            <?php echo form_input($new_password);?>
      </p>

      <p>
            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
            <?php echo form_input($new_password_confirm);?>
      </p>

      <?php echo form_input($user_id);?>
      <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p>

<?php echo form_close();?> -->
