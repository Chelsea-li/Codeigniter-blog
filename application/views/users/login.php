
<?php echo form_open('users/login'); ?>
    <?php echo validation_errors(); ?>
    <div class="row">
        <div class="well col-sm-6 col-sm-offset-3">
            <h2 class="text-center"><?= $title; ?></h2><hr>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-info">Log in</button>
            </div>
        </div>
    </div>    
<?php echo form_close(); ?>