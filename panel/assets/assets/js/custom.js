$(document).ready(function () {

    $(".sortable").sortable();

    $(".remove-btn").click(function () {

        var $data_url = $(this).data("url");

        swal({
            title: 'Emin misiniz?',
            text: "Bu işlemi geri alamayacaksınız!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText : "Hayır"
        }).then(function (result) {
            if (result.value) {

                window.location.href = $data_url;
            }
        });

    })

    $(".isActive").change(function(){

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){

            $.post($data_url, { data : $data}, function (response) {

            });

        }

    })

    $(".sortable").on("sortupdate", function(event, ui){

        var $data = $(this).sortable("serialize");
        var $data_url = $(this).data("url");

        $.post($data_url, {data : $data}, function(response){})

    })

    /*Çalışmadığı için type türü date'e Çevrildi... */
    /*function formDate() {
        var input = document.getElementById("birthdate");
        var value = input.value.replace(/\D/g, ''); //Sadece Sayıları Alınmasının Sağlanması.

        if (value.lenght > 2 && value.lenght <= 4) {
            input.value = value.substr(0,2) + '/' + value.substr(2);
        } else if (value.lenght > 4 && value.lenght <= 6) {
            input.value = value.substr(0, 2) + '/' + value.substr(2, 2) + '/' + value.substr(4);
        } else if (value.lenght >6 ) {
            input.value = value.substr(0, 2) + '/' + value.substr(2, 2) + '/' + value.substr(4, 4);
        }
    }*/




})

