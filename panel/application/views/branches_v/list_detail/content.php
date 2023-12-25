<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->name</b>" . " adlı Şubenin Detaylı Bilgileri"; ?>
        </h4>
    </div><!-- END column -->

<div class="col-md-12" >
    <div class="widget p-lg">
        <table class="table table-bordered text-center" border="2px">
            <tr class="text-center">
                <th>Şube Adı</th>
                <th><?php echo $item->name; ?></th>
                <th><img width="90px" height="50px" src="<?php echo base_url("uploads/{$viewFolder}/$item->image_url"); ?>" alt="<?php echo $item->image_url; ?>" class="img-responsive"></th>
            </tr>
            <tr>
                <td>Şube Email Adresi</td>
                <td><?php echo $item->email; ?></td>
            </tr>
            <tr>
                <td>Şube Adresi</td>
                <td><?php echo $item->adress; ?></td>
            </tr>
            <tr>
                <td>Şube Sabit Telefon Numarası</td>
                <td><?php echo $item->phone; ?></td>
            </tr>
            <tr>
                <td>Şube Telefon Numarası</td>
                <td><?php echo $item->gsm; ?></td>
            </tr>
            <tr>
                <td>Şube Bulunduğu İl</td>
                <td><?php echo $item->province; ?></td>
            </tr>
            <tr>
                <td>Şube Bulunduğu İlçe</td>
                <td><?php echo $item->district; ?></td>
            </tr>
            <tr>
                <td>Şube İnstagram Adresi</td>
                <td><?php echo $item->instagram; ?></td>
            </tr>
            <tr>
                <td>Şubenin Facebook Adresi</td>
                <td><?php echo $item->facebook; ?></td>
            </tr>
            <tr>
                <td>Şubenin Harita Bilgileri</td>
                <td><a href="<?php echo $item->mapCode; ?>"><?php echo $item->mapCode; ?></a></td>
            </tr>

        </table>
        <br><br>
        <a href="<?php echo base_url("branches"); ?>" class="btn btn-md btn-danger btn-outline">Geri Dön</a>
    </div><!-- .widget -->
</div><!-- END column -->