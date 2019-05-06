<?if (!$allow):?>
    <form method="post">
        <div class="auth-form">
            <label for="InputEmail"></label>
            <input class="auth-form-input" name="login" type="text" id="InputEmail" placeholder="Enter login">
        </div>
        <div class="auth-form">
            <label for="InputPassword"></label>
            <input class="auth-form-input" name="password" type="password" id="InputPassword" placeholder="Password">
        </div>
        <div class="auth-form remember">
            <input name="remember" type="checkbox" id="Check">
            <label for="Check">Remember me</label>
        </div>
        <div class="auth-form">
        <button class="auth-button" type="submit" name="login_user">Enter</button>
        <button class="auth-button" type="submit" name="reg_user">Registration</button>
        </div>
    </form>
<?else:?>
<div class="reg-form">
    <h4> Wellcom to our site!</h4>
    <a class="escape" href='?logout'>Escape</a>
</div>
<?endif;?>
