<?php

class Appointments extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "Appointments_v";

        $this->load->model("Appointments_model");

        $this->load->model("Customers_model");
        $this->load->model("Branches_model");
        $this->load->model("Staff_model");
        $this->load->model("Services_model");
        $this->load->model("Products_model");


        if (!ActiveUserControl()){
            redirect(base_url("login"));
        }

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->Appointments_model->get_all(
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

        $customers = $this->Customers_model->get_all(
            array(
                "isActive"  => 1
            )
        );

        $branches = $this->Branches_model->get_all(
          array(
              "isActive" => 1
          )
        );

        $staff = $this->Staff_model->get_all(
            array(
                "isActive" => 1
            )
        );

        $services = $this->Services_model->get_all(
            array(
                "isActive" => 1
            )
        );

        $products = $this->Products_model->get_all(
            array(
                "isActive" => 1
            )
        );

        $viewData->branches = $branches;
        $viewData->customers = $customers;
        $viewData->staff = $staff;
        $viewData->services = $services;
        $viewData->products = $products;

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save(){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("name", "İsim", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->Appointments_model->save(
                array(
                    "name"         => $this->input->post("name"),
                    "id_customers" => $this->input->post("id_customers"),
                    "id_branches"  => $this->input->post("id_branches"),
                    "id_staff"     => $this->input->post("id_staff"),
                    "id_services"  => $this->input->post("id_services"),
                    "id_products"  => $this->input->post("id_products"),
                    "description"  => $this->input->post("description"),
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
                redirect(base_url("Appointments"));

            } else {
                $alert = array(
                    "title"     => "İşlem Başarısız",
                    "text"      => "Kayıt İşlemi Sırasında Bir Problemle Karşılaştık",
                    "type"      => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("Appointments"));

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
        $item = $this->Appointments_model->get(
            array(
                "id"    => $id,
            )
        );

        $branches = $this->Branches_model->get_all(
            array(
                "isActive" => 1
            )
        );

        $customers = $this->Customers_model->get_all(
            array(
                "isActive" => 1
            )
        );

        $staff = $this->Staff_model->get_all(
            array(
                "isActive" => 1
            )
        );

        $services = $this->Services_model->get_all(
            array(
                "isActive" => 1
            )
        );

        $products = $this->Products_model->get_all(
            array(
                "isActive" => 1
            )
        );

        $viewData->branches = $branches;
        
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $viewData->branches = $branches;
        $viewData->customers = $customers;
        $viewData->staff = $staff;
        $viewData->services = $services;
        $viewData->products = $products;

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

            $update = $this->Appointments_model->update(
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
                redirect(base_url("Appointments"));

            } else {
                $alert = array(
                    "title"     => "Güncelleme Başarısız",
                    "text"      => "Güncelleme İşlemi Sırasında Bir Problemle Karşılaştık",
                    "type"      => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("Appointments"));

            }

        } else {

            $viewData = new stdClass();

            /** Tablodan Verilerin Getirilmesi.. */
            $item = $this->Appointments_model->get(
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

        $delete = $this->Appointments_model->delete(
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
            redirect(base_url("Appointments"));
        } else {
            $alert = array(
                "title"     => "İşlem Başarısız ",
                "text"      => "Silme İşlemi Sırasında Bir Porblemle Karşılaştık",
                "type"      => "error"
            );

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Appointments"));
        }

    }

    public function isActiveSetter($id){

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->Appointments_model->update(
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
