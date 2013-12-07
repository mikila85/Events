<div class="header">
    <div class="details_holder">
        <div class="logo"><a href="/"><img src="/images/logo.png" alt=""></a></div>
        <div class="navigation">
            <ul>
                <li><a href="/event/create">Create</a></li>
                <li class="nospace"><a href="#">Browse</a></li>
            </ul>
        </div>
        <div class="header_content">
            <div class="login_btn"><a href="#"><img src="/images/login.png" alt=""></a></div>
            <div class="search_holder">
                <input name="" type="text" value="Search"><input name="" type="submit" class="btn_style">
            </div>



            <?php if(Auth::check()) : ?>
                <div class="login_signup"><a href="/users/login"><?= Auth::user()->firstname . " " . Auth::user()->lastname ?></a> I <a href="/users/logout" class="signup">Logout</a></div>
            <?php else : ?>
                <div class="login_signup"><a href="/users/login">Login</a> I <a href="/users/create" class="signup">Sign Up</a></div>
            <?php endif; ?>


        </div>
    </div>
</div>