<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Şube Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("branches/save") ?>" method="post">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Şube'nin Fotoğrafı:</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" name="img">
                            <small class="pull-right input-form-error"> Ürün İçin Fotoğraf Ekleyiniz. jpg - jpeg - png türünde dosyalar desteklenmelidir. </small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Şube Adı:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Şube Adını Giriniz" name="name" value="<?php echo isset($form_error) ? set_value("name") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Şube Email:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Şube Emailini Giriniz..." name="email" value="<?php echo isset($form_error) ? set_value("email") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("email"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Şube Adresi:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Şube Adresini Giriniz..." name="adress" value="<?php echo isset($form_error) ? set_value("adress") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("adress"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Şube Telefonları:</label>
                        <div class="col-sm-3">
                            <input type="text" maxlength="11" class="form-control" placeholder="Şube Sabit Telefon Numarasını Giriniz..." name="phone" value="<?php echo isset($form_error) ? set_value("phone") : ""; ?>">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" maxlength="11" class="form-control" placeholder="Şube Telefon Numarsını Giriniz..." name="gsm" value="<?php echo isset($form_error) ? set_value("gsm") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("phone"); ?></small>
                        <?php } ?>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("gsm"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Şube İl-İlçe:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Şube Bulunduğu İli Giriniz..." name="province" value="<?php echo isset($form_error) ? set_value("province") : ""; ?>">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Şube Bulunduğu İlçeyi Giriniz..." name="district" value="<?php echo isset($form_error) ? set_value("district") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("province"); ?></small>
                        <?php } ?>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("district"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Şube Sosyal Medya:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Şube'nin İnstagram Bağlantı Linkini Giriniz..." name="instagram" value="<?php echo isset($form_error) ? set_value("instagram") : ""; ?>">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Şube'nin Facebook Bağlantı Linkini Giriniz..." name="facebook" value="<?php echo isset($form_error) ? set_value("facebook") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("instagram"); ?></small>
                        <?php } ?>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("facebook"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Şube Harita:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Şube Harita Linkini Giriniz..." name="mapCode" value="<?php echo isset($form_error) ? set_value("mapCode") : ""; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-success">Kaydet</button>
                            <a href="<?php echo base_url("branches"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                        </div>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>


