<div class="row justify-content-center" style="margin-top:50px">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                
                <h1><?php echo lang('edit_user_heading');?></h1>
                <p><?php echo lang('edit_user_subheading');?></p>

                <div id="infoMessage"><?php echo $message;?></div>

                <?php echo form_open(uri_string());?>

                    <p>
                            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
                            <?php echo form_input($first_name, '' ,array('class'=>'form-control', 'placeholder'=>'Nama Depan'));?>
                    </p>

                    <p>
                            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
                            <?php echo form_input($last_name, '' ,array('class'=>'form-control', 'placeholder'=>'Nama Belakang'));?>
                    </p>

                    <p>
                            <?php echo lang('edit_user_company_label', 'company');?> <br />
                            <?php echo form_input($company, '' ,array('class'=>'form-control', 'placeholder'=>'Instansi'));?>
                    </p>

                    <p>
                            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
                            <?php echo form_input($phone, '' ,array('class'=>'form-control', 'placeholder'=>'HP/WA'));?>
                    </p>

                    <p>
                            <?php echo lang('edit_user_password_label', 'password');?> <br />
                            <?php echo form_input($password, '' ,array('class'=>'form-control', 'placeholder'=>'Password'));?>
                    </p>

                    <p>
                            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
                            <?php echo form_input($password_confirm, '' ,array('class'=>'form-control', 'placeholder'=>'Konfirm Password'));?>
                    </p>

                    <?php if ($this->ion_auth->is_admin()): ?>

                        <h3><?php echo lang('edit_user_groups_heading');?></h3>
                        <?php foreach ($groups as $group):?>
                            <label class="checkbox">
                            <?php
                                $gID=$group['id'];
                                $checked = null;
                                $item = null;
                                foreach($currentGroups as $grp) {
                                    if ($gID == $grp->id) {
                                        $checked= ' checked="checked"';
                                    break;
                                    }
                                }
                            ?>
                            <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                            <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                            </label>
                        <?php endforeach?>

                    <?php endif ?>

                    <?php echo form_hidden('id', $user->id);?>
                    <?php echo form_hidden($csrf); ?>

                    <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>

                <?php echo form_close();?>


            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->

</div>