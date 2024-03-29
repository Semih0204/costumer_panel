<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni İşlem Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("services/save") ?>" method="post">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">İşlem Fotoğrafı:</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" name="img">
                            <small class="pull-right input-form-error"> İşlem Fotoğraf Ekleyiniz. jpg - jpeg - png türünde dosyalar desteklenmelidir. </small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">İşlem Adı:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="İşlem Adını Giriniz" name="name" value="<?php echo isset($form_error) ? set_value("name") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">İşlem Süresi:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" placeholder="İşlem Süresini Giriniz" name="time" value="<?php echo isset($form_error) ? set_value("time") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("time"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">İşlem Fiyatı</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="price" value="<?php echo isset($form_error) ? set_value("price") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("price"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="textarea1" class="col-sm-3 control-label">İşlem Açıklaması:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="textarea1" placeholder="İşlem Açıklamasını Giriniz." name="description"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-success">Kaydet</button>
                            <a href="<?php echo base_url("services"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                        </div>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>


