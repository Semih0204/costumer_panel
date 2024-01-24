<?php

class Branches extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "branches_v";

        $this->load->model("branches_model");

        if (!ActiveUserControl()){
            redirect(base_url("login"));
        }

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->branches_model->get_all(
            array()
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function list_detail($id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->branches_model->get(
            array(
                "id" => $id
            )
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list_detail";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save(){
        //echo pathinfo($_FILES["img"]["name"], PATHINFO_FILENAME);
       // print_r($_FILES["img"]);

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("name", "Başlık", "required|trim");
        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email");
        $this->form_validation->set_rules("adress", "Adres", "required|trim");
        $this->form_validation->set_rules("phone", "Telefon-1", "required|trim");
        $this->form_validation->set_rules("gsm", "Telefon-2", "required|trim");
        $this->form_validation->set_rules("province", "İl", "required|trim");
        $this->form_validation->set_rules("district", "İlçe", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email"   => "Lütfen Geçerli Bir Email Adresi Giriniz"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();
        // TRUE - FALSE

        //validate değeri eğer true ise
        if($validate){
            $uploaded_file = "";

            if($_FILES["img"]["name"] == "") {
                $uploaded_file = "default.jpg";
                $upload = true;

            } else {

                //Resimin Yüklenmesi
                //Yüklenecek olan resmin isminin isminin otomatik olarak düzenlenmesi

                $file_name = convertToSEO(pathinfo($_FILES["img"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);

                //Dosyanın adını uzantı bölümüne kadar pathinfo_file name ile alınır ve seo uyumlu hale gelecek şekilde değiştirilir.
                //Yüklenecek dosyanın uzantısına ulaşmak içinse PATHINFO_EXTENSION kullanılır ve seo uyumlu olacak şekilde güncellenir.

                $config["allowed_types"]    = "jpg|jpeg|png";
                $config["upload_path"]      = "uploads/$this->viewFolder/";
                $config["file_name"]        = "$file_name";

                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("img");
                $uploaded_file = $this->upload->data("file_name");

            }

            if ($upload) {
                $data = array(
                    "image_url"     => $uploaded_file,
                    "name"          => $this->input->post("name"),
                    "email"         => $this->input->post("email"),
                    "adress"           => $this->input->post("adress"),
                    "phone"           => $this->input->post("phone"),
                    "gsm"           => $this->input->post("gsm"),
                    "province"           => $this->input->post("province"),
                    "district"           => $this->input->post("district"),
                    "instagram"           => $this->input->post("instagram"),
                    "facebook"           => $this->input->post("facebook"),
                    "mapCode"           => $this->input->post("mapCode"),
                    "isActive"      =>1,
                    "createdAt"     => date("Y-m-d H:i:s")
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text"  => "KAyıt işlemi sırasında bir problem oldu",
                    "type" => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                /*redirect(base_url("admin/branches/new_form"));*/
            }


            $insert = $this->branches_model->add($data);

            // TODO Alert sistemi eklenecek...
            if($insert){

                $alert = array(
                    "title" => "işlem Başarılı",
                    "text"  => "Kayıt işlemi başarılı bir şekilde gerçekleşti..",
                    "type"  => "success"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("branches"));

            } else {

                $alert = array(
                    "title" => "İşlem Gerçekleştirilmedi",
                    "text" => "Kayıt işlemi sırasında bir problemle karşılaştık!",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("branches"));
            }
        } else {
            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form($id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->branches_model->get(
            array(
                "id"    => $id,
            )
        );
        
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function update($id){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("name", "Başlık", "required|trim");
        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email");
        $this->form_validation->set_rules("adress", "Adres", "required|trim");
        $this->form_validation->set_rules("phone", "Telefon-1", "required|trim");
        $this->form_validation->set_rules("gsm", "Telefon-2", "required|trim");
        $this->form_validation->set_rules("province", "İl", "required|trim");
        $this->form_validation->set_rules("district", "İlçe", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        // TRUE - FALSE
        $validate = $this->form_validation->run();

        if($validate){

            $uploaded_file = "";

            if($_FILES["img"]["name"] == "") {
                $uploaded_file = "default.jpg";
                $upload = true;

            } else {

                //Resimin Yüklenmesi
                //Yüklenecek olan resmin isminin isminin otomatik olarak düzenlenmesi

                $file_name = convertToSEO(pathinfo($_FILES["img"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);

                //Dosyanın adını uzantı bölümüne kadar pathinfo_file name ile alınır ve seo uyumlu hale gelecek şekilde değiştirilir.
                //Yüklenecek dosyanın uzantısına ulaşmak içinse PATHINFO_EXTENSION kullanılır ve seo uyumlu olacak şekilde güncellenir.

                $config["allowed_types"]    = "jpg|jpeg|png";
                $config["upload_path"]      = "uploads/$this->viewFolder/";
                $config["file_name"]        = "$file_name";

                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("img");
                $uploaded_file = $this->upload->data("file_name");

            }

            $update = $this->branches_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "image_url"     => $uploaded_file,
                    "name"         => $this->input->post("name"),
                    "email"         => $this->input->post("email"),
                    "adress"           => $this->input->post("adress"),
                    "phone"           => $this->input->post("phone"),
                    "gsm"           => $this->input->post("gsm"),
                    "province"           => $this->input->post("province"),
                    "district"           => $this->input->post("district"),
                    "instagram"           => $this->input->post("instagram"),
                    "facebook"           => $this->input->post("facebook"),
                    "mapCode"           => $this->input->post("mapCode")
                )
            );

            // TODO Alert sistemi eklenecek...
            if($update){

                $alert = array(
                    "title"     => "İşlem Başarılı",
                    "text"      => "Kayıt İşlemi Başarılı",
                    "type"      => "success"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("branches"));

            } else {
                $alert = array(
                    "title"     => "İşlem Başarısız",
                    "text"      => "Kayıt İşlemi Sırasında Bir Problemle Karşılaştık",
                    "type"      => "Error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("branches"));

            }

        } else {

            $viewData = new stdClass();

            /** Tablodan Verilerin Getirilmesi.. */
            $item = $this->branches_model->get(
                array(
                    "id"    => $id,
                )
            );

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

        // Başarılı ise
        // Kayit işlemi baslar
        // Başarısız ise
        // Hata ekranda gösterilir...

    }

    public function delete($id){

        $delete = $this->branches_model->delete(
            array(
                "id"    => $id
            )
        );

        // TODO Alert Sistemi Eklenecek...
        if($delete){
            $alert = array(
                "title"     => "İşlem Başarılı",
                "text"      => "Silme İşlemi Başarılı",
                "type"      => "success"
            );

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("branches"));
        } else {
            $alert = array(
                "title"     => "İşlem Başarısız",
                "text"      => "Silme İşlemi Sırasında Bir Problemle Karşılaştık",
                "type"      => "error"
            );

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("branches"));
        }

    }

    public function isActiveSetter($id){

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->branches_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

}
