<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Çalışan Listesi
            <a href="<?php echo base_url("staff/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("staff/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped">
                    <thead>
                        <th><i class="fa fa-reorder"></i></th>
                        <th>#id</th>
                        <th>Çalıştığı Şube</th>
                        <th>İsim</th>
                        <th>Soyisim</th>
                        <th>Pozisyon</th>
                        <th>gsm</th>
                        <th>Email</th>
                        <th>Maaş</th>
                        <th>Durumu</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("Staff/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td>#<?php echo $item->id; ?></td>
                                <td>#<?php echo $item->id_branches; ?></td>
                                <td><?php echo $item->name; ?></td>
                                <td><?php echo $item->surname; ?></td>
                                <td><?php echo $item->position; ?></td>
                                <td><?php echo $item->gsm; ?></td>
                                <td><?php echo $item->email; ?></td>
                                <td><?php echo $item->wage; ?></td>
                                <td>
                                    <input
                                        data-url="<?php echo base_url("Staff/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td>
                                    <button
                                        data-url="<?php echo base_url("Staff/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("Staff/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>