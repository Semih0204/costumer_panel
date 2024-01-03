<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->username</b>" . " adlı Kullanıcı Şifresi Düzenleniyor"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("users/update_password/$item->id") ?>" method="post">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Şifre :</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" placeholder="Lütfen Şifrenizi Giriniz" name="password" value="<?php echo isset($form_error) ? set_value("password") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("password"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Şifre Tekrar :</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" placeholder="Şifrenizi Tekrar Giriniz" name="re_password" value="<?php echo isset($form_error) ? set_value("re_password") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("re_password"); ?></small>
                        <?php } ?>
                    </div>


                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-success">Güncelle</button>
                            <a href="<?php echo base_url("users"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                        </div>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>


