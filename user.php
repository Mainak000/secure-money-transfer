<div class="form-group">
    <label for="username" class="control-label">Username</label>
    <input type="text" id="username" name="username" class="form-control" value="<?php echo $_settings->userdata('username') ?>" pattern="^\S+$" title="Username cannot contain spaces" required>
</div>
<div class="form-group">
    <label for="password" class="control-label">Password</label>
    <input type="password" id="password" name="password" class="form-control" pattern="^\S+$" title="Password cannot contain spaces">
    <small><i>Leave this blank if you don't want to change your password</i></small>
</div> 