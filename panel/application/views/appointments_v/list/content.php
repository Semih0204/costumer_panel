<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Randevu Listesi
            <a href="<?php echo base_url("appointments/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("appointments/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped">
                    <thead>
                        <th>#id</th>
                        <th>Randevu Adı</th>
                        <th>Müşteri Adı</th>
                        <th>Randevu Şubesi</th>
                        <th>Çalışan</th>
                        <th>Yapılacak Olan İşlem</th>
                        <th>Kullanılacak Ürün</th>
                        <th>Randevu detayı</th>
                        <th>Durumu</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("appointments/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr>
                                <td>#<?php echo $item->id; ?></td>
                                <td><?php echo $item->name; ?></td>
                                <td><?php echo getCustomersName($item->id_customers); ?></td>
                                <td>#<?php echo getBranchName($item->id_branches); ?></td>
                                <td><?php echo getStaffName($item->id_staff); ?></td>
                                <td><?php echo getServicesName($item->id_services); ?></td>
                                <td><?php echo getProductName($item->id_products); ?></td>
                                <td><?php echo $item->description; ?></td>
                                <td>
                                    <input
                                        data-url="<?php echo base_url("appointments/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td>
                                    <button
                                        data-url="<?php echo base_url("appointments/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("appointments/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>
                <br>
                <hr>

                <div class="row">

                    <div class="col-md-4">
                        <form id="eventForm">
                            <div class="form-group">
                                <label for="eventTitle">Event Title:</label>
                                <input type="text" class="form-control" id="eventTitle" name="eventTitle" required>
                            </div>
                            <div class="form-group">
                                <label for="eventDate">Event Date:</label>
                                <input type="date" class="form-control" id="eventDate" name="eventDate" required>
                            </div>
                            <div class="form-group">
                                <label for="eventTime">Event Time:</label>
                                <input type="time" class="form-control" id="eventTime" name="eventTime" required>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="addEvent()">Add Event</button>
                        </form>
                    </div>
                    <div id="fullcalendar" class="col-md-8"></div>

                </div>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>







