<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->name</b>" . "'Çalışanın Bilgileri Düzenleniyor"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("staff/update/$item->id") ?>" method="post">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Çalıştığı Şube:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="id_branches">
                                <option value="<?php echo $item->id_branches; ?>">Çalışanın'nin Çalıştığı Şubeyi Seçiniz..</option>
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
                        <label class="col-sm-3 control-label">Çalışan Adı:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Çalışa'nın Adını Giriniz" name="name" value="<?php echo $item->name; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Çalışan Soyadı:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Çalışan'ın Soyadını Giriniz" name="surname" value="<?php echo $item->surname; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("surname"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Çalışma Pozisyonu :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Çalışa'nın Çalışma Pozisyonunu Giriniz." name="position" value="<?php echo $item->position; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("position"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Çalışan Telefon Numarsı :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Çalışan'ın Telefon Numarsını Giriniz" name="gsm" value="<?php echo $item->gsm; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("gsm"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Çalışan email adresi :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Çalışa'nın Email Adresini Giriniz." name="email" value="<?php echo $item->email; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("email"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Çalışan Maaşı :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Çalışa'nın Email Adresini Giriniz." name="wage" value="<?php echo $item->wage; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("wage"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-success">Güncelle</button>
                            <a href="<?php echo base_url("staff"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                        </div>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>


