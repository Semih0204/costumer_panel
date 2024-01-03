<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->username</b>" . " adlı Kullanıcı bilgilerini düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("users/update/$item->id") ?>" method="post">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ürün Fotoğrafı:</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" name="img">
                            <small class="pull-right input-form-error"> Kullanıcı İçin Fotoğraf Ekleyiniz. jpg - jpeg - png türünde dosyalar desteklenmelidir. </small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kullanıcı Adı:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Kullanıcı Adını Giriniz" name="username" value="<?php echo isset($form_error) ? set_value("username") : $item->username; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("username"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">İsim :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="İsiminizi Giriniz" name="name" value="<?php echo isset($form_error) ? set_value("name") : $item->name; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Soyisim :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Soyisminizi Giriniz" name="surname" value="<?php echo isset($form_error) ? set_value("surname") : $item->surname; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("surname"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" placeholder="Email Adresinizi Giriniz" name="email" value="<?php echo isset($form_error) ? set_value("email") : $item->email; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("email"); ?></small>
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


