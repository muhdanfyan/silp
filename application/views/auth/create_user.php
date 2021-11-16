<div class="row justify-content-center" style="margin-top:50px">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h1><?php echo lang('create_user_heading');?></h1>
                <p><?php echo lang('create_user_subheading');?></p>

                <div id="infoMessage"><?php echo $message;?></div>

                <?php echo form_open("auth/create_user");?>

                    <div class="form-group">
                            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                            <?php echo form_input($first_name, '' ,array('class'=>'form-control', 'placeholder'=>'Nama Depan'));?>
                    </div>

                    <div class="form-group">
                            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                            <?php echo form_input($last_name, '' ,array('class'=>'form-control', 'placeholder'=>'Nama Belakang'));?>
                    </div>
                    
                    <?php
                    if($identity_column!=='email') {
                        echo '<div class="form-group">';
                        echo lang('create_user_identity_label', 'identity');
                        echo '<br />';
                        echo form_error('identity');
                        echo form_input($identity);
                        echo '</div>';
                    }
                    ?>

                    <div class="form-group">
                            <?php echo lang('create_user_company_label', 'company');?> <br />
                            <?php echo form_input($company, '' ,array('class'=>'form-control', 'placeholder'=>'Instansi'));?>
                    </div>

                    <div class="form-group">
                            <?php echo lang('create_user_email_label', 'email');?> <br />
                            <?php echo form_input($email, '' ,array('class'=>'form-control', 'placeholder'=>'email'));?>
                    </div>

                    <div class="form-group">
                            <?php echo lang('create_user_phone_label', 'phone');?> <br />
                            <?php echo form_input($phone, '' ,array('class'=>'form-control', 'placeholder'=>'HP/WA'));?>
                    </div>

                    <div class="form-group">
                            <?php echo lang('create_user_password_label', 'password');?> <br />
                            <?php echo form_input($password, '' ,array('class'=>'form-control', 'placeholder'=>'Password'));?>
                    </div>

                    <div class="form-group">
                            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                            <?php echo form_input($password_confirm, '' ,array('class'=>'form-control', 'placeholder'=>'Konfirm Password'));?>
                    </div>


                    <button type="submit" class="btn btn-primary waves-effect waves-light">Buat User</button>
                    <!-- <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p> -->

                <?php echo form_close();?>



            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->

</div>