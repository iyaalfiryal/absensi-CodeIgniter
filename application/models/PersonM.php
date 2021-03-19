<?php

// extends class Model
class PersonM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // function untuk insert data ke tabel tb_person
  public function add_product($nama_absensi,$pelajaran_absensi,$keterangan_absensi){

    if(empty($nama_absensi) || empty($pelajaran_absensi) || empty($keterangan_absensi)){
      return $this->empty_response();
    }else{
      $data = array(
        "nama_absensi"=>$nama_absensi,
        "pelajaran_absensi"=>$pelajaran_absensi,
        "keterangan_absensi"=>$keterangan_absensi
      );

      $insert = $this->db->insert("tb_absensi", $data);

      if($insert){
        // $response['status']=200;
        // $response['error']=false;
        // $response['message']='Data person ditambahkan.';
        $response=$data;
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data person gagal ditambahkan.';
        return $response;
      }
    }

  }

  // mengambil semua data person
  public function all_product(){

    $all = $this->db->get("tb_absensi")->result();
    // $response['status']=200;
    // $response['error']=false;
    $response =$all;
    return $response;

  }

  // hapus data person
  public function delete_product($id_absensi){

    if($id_absensi == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id_absensi"=>$id_absensi
      );

      $this->db->where($where);
      $delete = $this->db->delete("tb_absensi");
      if($delete){
        $response['status']=200; 
        $response['error']=false;
        $response['message']='Data person dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data person gagal dihapus.';
        return $response;
      }
    }

  }

  // update person
  public function update_product($id_absensi,$nama_absensi,
  $pelajaran_absensi,$keterangan_absensi){

    if($id_absensi == '' || empty($nama_absensi) || empty($pelajaran_absensi) || empty($keterangan_absensi)){
      return $this->empty_response();
    }else{
      $where = array(
        "id_absensi"=>$id_absensi
      );

      $set = array(
        "nama_absensi"=>$nama_absensi,
        "pelajaran_absensi"=>$pelajaran_absensi,
        "keterangan_absensi"=>$keterangan_absensi
      );

      $this->db->where($where);
      $update = $this->db->update("tb_absensi",$set);
      if($update){
        // $response['status']=200;
        // $response['error']=false;
        // $response['message']='Data product diubah.';
        $response=$where+$set;
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data product gagal diubah.';
        return $response;
      }
    }

  }

}

?>
