<?php
$passmatch = @$_GET['passmatch'];

if(array_key_exists('password', $mfieldkeys)){
    ?>
    <label class="errmsg">'Password' field needs to be filled in.</label>
    <br/>
    <?php
}
if($passmatch){
    ?>
    <label class="errmsg">Passwords must match.</label>
    <br/>
    <?php
}?>

<div class="block-label-bordered">
    <label for="password" class="block-label-white">Your password:</label>
    <input name="password" id="new_password" type="password">
</div>
<div class="block-label-bordered">
    <label for="password" class="block-label-white">Retype password:</label>
    <input name="passcopy" id="copy_password" type="password">
</div>
