<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Şube Listesi
            <a href="<?php echo base_url("branches/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">


            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("branches/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped">
                    <thead>
                        <th><i class="fa fa-reorder"></i></th>
                        <th>#id</th>
                        <th>Şube Resmi</th>
                        <th>Şube İsmi</th>
                        <th>Şube Email</th>
                        <th>Şube Telefonu</th>
                        <th>İl</th>
                        <th>İlçe</th>
                        <th>Durumu</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("branches/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td>#<?php echo $item->id; ?></td>
                                <td><img width="90px" height="50px" src="<?php echo base_url("uploads/{$viewFolder}/$item->image_url"); ?>" alt="<?php echo $item->image_url; ?>" class="img-responsive"></td>

                                <td><?php echo $item->name; ?></td>
                                <td><?php echo $item->email; ?></td>
                                <td><?php echo $item->gsm; ?></td>
                                <td><?php echo $item->province; ?></td>
                                <td><?php echo $item->district; ?></td>
                                <td>
                                    <input
                                        data-url="<?php echo base_url("branches/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td>
                                    <button
                                        data-url="<?php echo base_url("branches/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("branches/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                    <a href="<?php echo base_url("branches/list_detail/$item->id"); ?>" class="btn btn-sm btn-purple btn-outline"><i class="fa fa-file-word-o"></i> Detaylar</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>
<div>
    <button class="btn btn-sm btn-danger btn-outline">
    <a href="https://www.instagram.com/" target="_blank">Koştur Koştur bilader</a>
    </button>
</div>