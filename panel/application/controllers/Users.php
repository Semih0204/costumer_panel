<?php

class Users extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("users_model");

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->users_model->get_all(
            array()
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

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
        $this->form_validation->set_rules("username", "Kullanıcı Adı", "required|trim|is_unique[users.username]");
        $this->form_validation->set_rules("name", "isim", "required|trim");
        $this->form_validation->set_rules("surname", "soyisim", "required|trim");
        $this->form_validation->set_rules("email", "email", "required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password", "password", "required|trim|min_length[8]");
        $this->form_validation->set_rules("re_password", "re_password", "required|trim|min_length[8]|matches[password]");


        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email"   => "Lütfen Geçerli Bir E-posta Adresi Giriniz",
                "is_unique"     => "<b>{field}</b> adlı bir kayıt bulunmaktadır. Başka bir seçenek deneyiniz",
                "matches"       => "Lütfen Aynı Şifreyi Giriniz"
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
                    "username"      => $this->input->post("username"),
                    "name"      => $this->input->post("name"),
                    "surname"      => $this->input->post("surname"),
                    "email"         => $this->input->post("email"),
                    "password"      => md5($this->input->post("password")),
                    "isActive"      =>1,
                    "createdAt"     => date("Y-m-d H:i:s")
                );
            } else {
                $alert = array(
                    "name" => "İşlem Başarısız",
                    "text"  => "Kayıt işlemi sırasında bir problem oldu",
                    "type" => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                /*redirect(base_url("admin/users/new_form"));*/
            }


            $insert = $this->users_model->add($data);

            // TODO Alert sistemi eklenecek...
            if($insert){

                $alert = array(
                    "title" => "işlem Başarılı",
                    "text"  => "Kayıt işlemi başarılı bir şekilde gerçekleşti..",
                    "type"  => "success"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("users"));


            } else {

                $alert = array(
                    "title" => "İşlem Gerçekleştirilmedi",
                    "text" => "Kayıt işlemi sırasında bir problemle karşılaştık!",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("users"));
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
        $item = $this->users_model->get(
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

    public function update_password_form($id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->users_model->get(
            array(
                "id"    => $id,
            )
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "password";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function update($id){

        $this->load->library("form_validation");

        $oldUser = $this->users_model->get(
            array(
                "id"    => $id
            )
        );

        if ($oldUser->username != $this->input->post("username")){
            $this->form_validation->set_rules("username", "Kullanıcı Adı", "required|trim|is_unique[users.username]");
        }

        if ($oldUser->email != $this->input->post("email")){
            $this->form_validation->set_rules("email", "email", "required|trim|valid_email|is_unique[users.email]");
        }

        // Kurallar yazilir..



        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email"   => "Lütfen Geçerli Bir E-posta Adresi Giriniz",
                "is_unique"     => "<b>{field}</b> adlı bir kayıt bulunmaktadır. Başka bir seçenek deneyiniz",
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

            $update = $this->users_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "image_url"     => $uploaded_file,
                    "username"      => $this->input->post("username"),
                    "name"      => $this->input->post("name"),
                    "surname"      => $this->input->post("surname"),
                    "email"         => $this->input->post("email")
                )
            );

            // TODO Alert sistemi eklenecek...
            if($update){

                redirect(base_url("users"));

            } else {

                redirect(base_url("users"));

            }

        } else {

            $viewData = new stdClass();

            /** Tablodan Verilerin Getirilmesi.. */
            $item = $this->users_model->get(
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

    public function update_password($id){

        $this->load->library("form_validation");

        $oldUser = $this->users_model->get(
            array(
                "id"    => $id
            )
        );

        // Kurallar yazilir..
        $this->form_validation->set_rules("password", "şifre", "required|trim|min_length[8]");
          $this->form_validation->set_rules("re_password", "şifre tekrar", "required|trim|min_length[8]|matches[password]");

        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> alanı doldurulmalıdır",
                "matches"       => "Şifreler Birbirleriyle Aynı Değil"
            )
        );

        // Form Validation Calistirilir..
        // TRUE - FALSE
        $validate = $this->form_validation->run();

        if($validate){


            $update = $this->users_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "password"      => md5($this->input->post("password"))
                )
            );

            // TODO Alert sistemi eklenecek...
            if($update){
               /* if ($update) {
                    $alert = array(
                        "title"     => "İşlem Başarılı",
                        "text"      => "Şifreniz Başarılı Bir Şekilde Güncellendi",
                        "type"      => "success"
                    );
                }*/
                redirect(base_url("users"));

            } else {
                /*$alert = array(
                    "title"     => "İşlem Başarısız",
                    "text"      => "Şifre Güncellenirken Bir Hata İle Karşılaştık",
                    "type"      => "error"
                );

                //İşlem Sonucunun Session'a yazma işlemi...
                $this->session->set_flashdata("alert", $alert);*/

                redirect(base_url("users"));
            }
        } else {

            $viewData = new stdClass();

            /** Tablodan Verilerin Getirilmesi.. */
            $item = $this->users_model->get(
                array(
                    "id"    => $id,
                )
            );

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "password";
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

        $delete = $this->users_model->delete(
            array(
                "id"    => $id
            )
        );

        // TODO Alert Sistemi Eklenecek...
        if($delete){
            redirect(base_url("users"));
        } else {
            redirect(base_url("users"));
        }

    }

    public function isActiveSetter($id){

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->users_model->update(
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
