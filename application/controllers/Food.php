<?php

require APPPATH . 'libraries/REST_Controller.php';

class Food extends REST_Controller
{

  // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model('FoodModel');
    }

    // method index untuk menampilkan semua data person menggunakan method get
    public function index_get()
    {
        $response = $this->FoodModel->all_product();
        $this->response($response);
    }

    // untuk menambah person menaggunakan method post
    public function add_post()
    {
        $response = $this->FoodModel->add_product(
            $this->post('nama_food'),
            $this->post('gambar_food'),
            $this->post('deskripsi_food'),
            $this->post('harga_food')
        );
        $this->response($response);
    }

    // update data person menggunakan method put
    public function update_put()
    {
        $response = $this->FoodModel->update_product(
            $this->put('id_food'),
            $this->put('nama_food'),
            $this->put('gambar_food'),
            $this->put('deskripsi_food'),
            $this->put('harga_food')
        );
        $this->response($response);
    }

    // hapus data person menggunakan method delete
    public function delete_delete()
    {
        $response = $this->FoodModel->delete_product(
            $this->delete('id_food')
        );
        $this->response($response);
    }
}
