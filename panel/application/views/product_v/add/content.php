<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Ürün Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("product/save") ?>" method="post">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ürün Fotoğrafı:</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" name="img">
                            <small class="pull-right input-form-error"> Ürün İçin Fotoğraf Ekleyiniz. jpg - jpeg - png türünde dosyalar desteklenmelidir. </small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ürün Adı:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Ürün Adını Giriniz" name="name">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ürün Fiyatı</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="price">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="textarea1" class="col-sm-3 control-label">Ürün Açıklaması:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="textarea1" placeholder="Ürünün Açıklamasını Giriniz." name="description"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-success">Kaydet</button>
                            <a href="<?php echo base_url("product"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                        </div>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>


