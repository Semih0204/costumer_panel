<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Müşteri Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("customers/save") ?>" method="post">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Müşteri Adı:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Müşteri'nin Adını Giriniz" name="name" value="<?php echo isset($form_error) ? set_value("name") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Müşteri Soyadı:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Müşteri'nin Soyadını Giriniz" name="surname" value="<?php echo isset($form_error) ? set_value("surname") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("surname"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Cinsiyet :</label>
                        <div class="col-sm-6">
                            <select style="height: 25px" class="col-sm-5" name="gender" id="gender" >
                                <option value="0">Lütfen Cinsiyet Seçiniz</option>
                                <option value="1">Kadın</option>
                                <option value="2">Erkek</option>
                            </select>
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("gender"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Doğum Tarihi : </label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" placeholder="Müşteri Doğum Tarihini GG/AA/YY Şeklinde Giriniz" name="birthday">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("birthday"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Müşteri Email:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" placeholder="Müşteri'nin Email Adresini Giriniz" name="email" value="<?php echo isset($form_error) ? set_value("email") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("email"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Telefon Numarası:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" maxlength="11" placeholder="Müşteri'nin Telefon Numarsını Giriniz" name="gsm" value="<?php echo isset($form_error) ? set_value("gsm") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("gsm"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Adres:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Müşteri'nin Adresini Giriniz" name="adress" value="<?php echo isset($form_error) ? set_value("adress") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("adress"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="textarea1" class="col-sm-3 control-label">Müşteri Detayları:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="textarea1" placeholder="Müşteri'nin Özel Durumları ya da Alerjik Durumlarını Giriniz.." name="description"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-success">Kaydet</button>
                            <a href="<?php echo base_url("customers"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                        </div>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>




