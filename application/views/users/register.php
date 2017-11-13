<h2 class="text-center"><?= $title; ?></h2><hr>
<?php echo form_open('users/register'); ?>
    <div class="form-horizontal col-md-6 col-md-offset-3">
        <?php echo validation_errors(); ?>
        <div class="well">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value='<?php echo set_value('name'); ?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value='<?php echo set_value('email'); ?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="username" name="username" value='<?php echo set_value('username'); ?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="form-group">
                <label for="password2" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password2" name="password2">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
<?php echo form_close(); ?>