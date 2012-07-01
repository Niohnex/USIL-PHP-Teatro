<div id="content">
    <div id="loginContent">
        <div id="leftLoginContent">
        <h3>LOG IN</h3>
        <p>Don't have an account? <a href="index.php?vista=registrar">Register!</a></p>
        </div>
        <div id="rightLoginContent">
            <?php if(isset($rs)) { ?>
                <?php 
                if($rs){
                    $user = $rs;
                    $_SESSION['user'] = serialize($user);
                }
                else
                    $msg = 'Wrong username or password, please try again';
                ?>
            <?php } ?>
            <form method="post" action="index.php?vista=login">
                <?php if(isset($msg)) { ?>
                    <strong class="righty"><?php echo $msg ?></strong>
                <?php } ?>
            
                <fieldset>
                    <a href="index.php?vista=recordarPwd">Forgot your password?</a>
                    <p><label for='username'>Username:</label><input type="text" name='username'></p>
                    <p><label for='pwd'>Password:</label><input type="password" name='pwd'></p>
                    <input type="submit" value="Log In &raquo;">
                </fieldset>
            </form>        
        </div>
    </div>  
</div>