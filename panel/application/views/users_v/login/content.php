<div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
        <a href="index.html">
            <span><i class="fa fa-gg"></i></span>
            <span>Proje - Yönetim Paneli Giriş</span>
        </a>
    </div><!-- logo -->
    <div class="simple-page-form animated flipInY" id="login-form">
        <h4 class="form-title m-b-xl text-center">.... Giriş Yapın</h4>
        <form action="<?php echo base_url("userop/do_login"); ?>" method="post">
            <div class="form-group">
                <input id="sign-in-email" type="email" class="form-control" placeholder="Email" name="email">
                <?php if(isset($form_error)) { ?>
                <small class="input-form-error"> <?php echo form_error("email"); ?></small>
                <?php }?>
            </div>

            <div class="form-group">
                <input id="sign-in-password" type="password" class="form-control" placeholder="Şifre" name="password">
                <?php if(isset($form_error)) { ?>
                    <small class="input-form-error"> <?php echo form_error("password"); ?></small>
                <?php }?>
            </div>

            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
    </div><!-- #login-form -->

    <div class="simple-page-footer">
        <p><a href="password-forget.html">Şifremi Unuttum </a></p>
    </div><!-- .simple-page-footer -->


</div><!-- .simple-page-wrap -->