<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Çalışan Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("staff/save") ?>" method="post">

                    <!--<div class="form-group">
                        <label class="col-sm-3 control-label">Çalıştığı Şube:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="id_branches" >
                                <option value="">Çalışma Şubesini Seçiniz..</option>
                                <?php /*foreach ($branches as $branch) { */?>
                                    <option value="<?php /*echo $branch->id; */?>"><?php /*echo $branch->name; */?></option>
                                <?php /*} */?>
                            </select>
                        </div>
                        <?php /*if(isset($form_error)){ */?>
                            <small class="input-form-error"> <?php /*echo form_error("is_branches"); */?></small>
                        <?php /*} */?>
                    </div>-->

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Çalıştığı Şube:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="id_branches">
                                <option value="">Çalışanın'nin Çalıştığı Şubeyi Seçiniz..</option>
                                <?php foreach ($branches as $branch) { ?>
                                    <option value="<?php echo $branch->id; ?>"><?php echo $branch->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("id_branches"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Çalışanın Adı:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Çalışanın'nin Adını Giriniz" name="name">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Çalışanın Soyadı:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Çalışanın'nin Soyadını Giriniz" name="surname">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("surname"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Çalıştığı Pozisyon:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Çalışma Pozisyonunu" name="position">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("position"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Telefon Numarası:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" maxlength="11" placeholder="Çalışan'nın Telefon Numarsını Giriniz" name="gsm">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("gsm"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Çalışan Email:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" placeholder="Çalışan'nın Email Adresini Giriniz" name="email">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("email"); ?></small>
                        <?php } ?>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label">Maaş:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" placeholder="Çalışanın Maaşını Giriniz" name="wage">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("wage"); ?></small>
                        <?php } ?>
                    </div>


                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-success">Kaydet</button>
                            <a href="<?php echo base_url("staff"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                        </div>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>




