<?php

class Staff extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "Staff_v";

        $this->load->model("Staff_model");

        $this->load->model("Branches_model");

        if (!ActiveUserControl()){
            redirect(base_url("login"));
        }

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->Staff_model->get_all(
            array(), "rank ASC"
        );

        $branches = $this->Branches_model->get_all(
            array(
                "isActive"  => 1
            )
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $viewData->branches = $branches;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        $branches = $this->Branches_model->get_all(
          array(
              "isActive" => 1
          )
        );

        $viewData->branches = $branches;

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save(){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("name", "İsim", "required|trim");
        $this->form_validation->set_rules("surname", "İsim", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        // TRUE - FALSE
        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->Staff_model->save(
                array(
                    "id_branches"  => $this->input->post("id_branches"),
                    "name"         => $this->input->post("name"),
                    "surname"         => $this->input->post("surname"),
                    "position"         => $this->input->post("position"),
                    "gsm"   => $this->input->post("gsm"),
                    "email"   => $this->input->post("email"),
                    "wage"   => $this->input->post("wage"),
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );

            // TODO Alert sistemi eklenecek...
            if($insert){
                $alert = array(
                    "title"     => "İşlem Başarılı",
                    "text"      => "Kayıt İşlemi Başarılı",
                    "type"      => "success"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("Staff"));

            } else {
                $alert = array(
                    "title"     => "İşlem Başarısız",
                    "text"      => "Kayıt İşlemi Sırasında Bir Problemle Karşılaştık",
                    "type"      => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("Staff"));

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
        $item = $this->Staff_model->get(
            array(
                "id"    => $id,
            )
        );

        $branches = $this->Branches_model->get_all(
            array(
                "isActive" => 1
            )
        );

        $viewData->branches = $branches;
        
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function update($id){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("name", "İsim", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        // TRUE - FALSE
        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->Staff_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "id_branches"  => $this->input->post("id_branches"),
                    "name"         => $this->input->post("name"),
                    "surname"         => $this->input->post("surname"),
                    "position"         => $this->input->post("position"),
                    "gsm"   => $this->input->post("gsm"),
                    "email"   => $this->input->post("email"),
                    "wage"   => $this->input->post("wage"),
                )
            );

            // TODO Alert sistemi eklenecek...
            if($update){
                $alert = array(
                    "title"     => "Güncelleme Başarılı",
                    "text"      => "Güncelleme İşlemi Başarılı",
                    "type"      => "success"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("Staff"));

            } else {
                $alert = array(
                    "title"     => "Güncelleme Başarısız",
                    "text"      => "Güncelleme İşlemi Sırasında Bir Problemle Karşılaştık",
                    "type"      => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("Staff"));

            }

        } else {

            $viewData = new stdClass();

            /** Tablodan Verilerin Getirilmesi.. */
            $item = $this->Staff_model->get(
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

        $delete = $this->Staff_model->delete(
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
            redirect(base_url("Staff"));
        } else {
            $alert = array(
                "title"     => "İşlem Başarısız ",
                "text"      => "Silme İşlemi Sırasında Bir Porblemle Karşılaştık",
                "type"      => "error"
            );

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Staff"));
        }

    }

    public function isActiveSetter($id){

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->Staff_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

    public function rankSetter(){


        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->Staff_model->update(
                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );

        }

    }

}
