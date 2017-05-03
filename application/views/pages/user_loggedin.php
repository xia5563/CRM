<?php echo $u . " " . $p ." ".$isAdmin."<br>"; ?>
<?php echo "I've logged in"; ?>

<?php echo form_open('user_controller/add_user'); ?>

<label for="username">Username</label>
<input type="input" name="username" /><br />

<label for="password">Password</label>
<input type="input" name="password" /><br />

<label for="email">Email</label>
<input type="input" name="email" /><br />



<input type="submit" name="submit" value="Add user" />

</form>
