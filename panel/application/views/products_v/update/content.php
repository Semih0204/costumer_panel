<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->name</b>" . " adlı ürünü düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("Products/update/$item->id") ?>" method="post">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ürün Fotoğrafı:</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="img" value="<?php echo isset($form_error) ? set_value("img") : $item->image_url; ?>">
                            <small class="pull-right input-form-error"> Ürün İçin Fotoğraf Ekleyiniz. jpg - jpeg - png türünde dosyalar desteklenmelidir. </small>
                        </div>
                        <div>
                            <img width="90px" height="50px" src="<?php echo base_url("uploads/{$viewFolder}/$item->image_url"); ?>" alt="<?php echo $item->image_url; ?>" class="img-responsive">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ürün Adı:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Ürün Adını Giriniz" name="name" value="<?php echo isset($form_error) ? set_value("name") : $item->name; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ürün Fiyatı</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="price" value="<?php echo isset($form_error) ? set_value("price") : $item->price; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"><?php echo form_error("price")?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="textarea1" class="col-sm-3 control-label">Ürün Açıklaması:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="textarea1" placeholder="Ürünün Açıklamasını Giriniz." name="description">
                                <?php echo  $item->description; ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-success">Güncelle</button>
                            <a href="<?php echo base_url("Products"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                        </div>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>


