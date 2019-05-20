<?php require('header.php')?>
<?php require('footer.php')?>
<form action="?act=do-login" method="POST" class="well">
    <label>Login</label>
    <input name="login" type="text"/>
    <label>Password</label>
    <input name="password" type="password"/>
    <div style="padding-top: 5px;">
        <button type="submit" class="btn">
            Submit
        </button>
    </div>
</form>
