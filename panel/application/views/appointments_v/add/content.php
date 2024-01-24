<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Randevu Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("appointments/save") ?>" method="post">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Randevu Adı:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Randevu Adını Giriniz" name="name" value="<?php echo isset($form_error) ? set_value("name") : ""; ?>">
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Müşteri Adı:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="id_customers">
                                <option value="">Lütfet Oluşturulacak Randevun'nun Müşterisini Seçiniz..</option>
                                <?php foreach ($customers as $customer) { ?>
                                    <option value="<?php echo $customer->id; ?>"><?php echo $customer->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("id_customers"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Randevu Şubesi:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="id_branches">
                                <option value="">Lütfen İşlem Yapılacak Şubeyi Seçiniz</option>
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
                        <label class="col-sm-3 control-label">İşlem Yapcak Çalışan:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="id_staff">
                                <option value="">Lütfen Yapılacak Olan İşlemi Seçiniz..</option>
                                <?php foreach ($staff as $staff) { ?>
                                    <option value="<?php echo $staff->id; ?>"><?php echo $staff->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("id_staff"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Yapılacak İşlem:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="id_services">
                                <option value="">Lütfen Yapılacak olan İşlemi Seçiniz</option>
                                <?php foreach ($services as $service) { ?>
                                    <option value="<?php echo $service->id; ?>"><?php echo $service->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("id_services"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kullanılacak Olan Ürün:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="id_products">
                                <option value="">İşlem Sırasında Kullanılacak Ürünü Seçiniz</option>
                                <?php foreach ($products as $product) { ?>
                                    <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("id_products"); ?></small>
                        <?php } ?>
                    </div>
                    
                    <!--<div class="col-sm-6">
                        <input type="date">
                        <input type="time">
                    </div>-->

                    <div class="form-group">
                        <label for="textarea1" class="col-sm-3 control-label">Müşteri Detayları:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="textarea1" placeholder="Randevu Notlarını Giriniz..." name="description"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-success">Kaydet</button>
                            <a href="<?php echo base_url("appointments"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                        </div>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>




