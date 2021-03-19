<?php

require APPPATH . 'libraries/REST_Controller.php';

class Person extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('PersonM');
  }

  // method index untuk menampilkan semua data person menggunakan method get
  public function index_get(){
    $response = $this->PersonM->all_product();
    $this->response($response);
  }

  // untuk menambah person menaggunakan method post
  public function add_post(){
    $response = $this->PersonM->add_product(
        $this->post('nama_absensi'),
        $this->post('pelajaran_absensi'),
        $this->post('keterangan_absensi')
      
      );
    $this->response($response);
  }

  // update data person menggunakan method put
  public function update_put(){
    $response = $this->PersonM->update_product(
        $this->put('id_absensi'),
        $this->put('nama_absensi'),
        $this->put('pelajaran_absensi'),
        $this->put('keterangan_absensi')
      );
    $this->response($response);
  }

  // hapus data person menggunakan method delete
  public function delete_delete(){
    $response = $this->PersonM->delete_product(
        $this->delete('id_absensi')
      );
    $this->response($response);
  }

}

?>
