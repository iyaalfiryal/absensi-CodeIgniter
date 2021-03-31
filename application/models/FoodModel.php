<?php

// extends class Model
class FoodModel extends CI_Model
{

  // response jika field ada yang kosong
    public function empty_response()
    {
        $response['status']=502;
        $response['error']=true;
        $response['message']='Field tidak boleh kosong';
        return $response;
    }

    // function untuk insert data ke tabel tb_food
    public function add_product($nama_food, $gambar_food, $deskripsi_food, $harga_food)
    {
        if (empty($nama_food) || empty($gambar_food) || empty($deskripsi_food) || empty($harga_food)) {
            return $this->empty_response();
        } else {
            $data = array(
        "nama_food"=>$nama_food,
        "gambar_food"=>$gambar_food,
        "deskripsi_food"=>$deskripsi_food,
        "harga_food"=>$harga_food
      );

            $insert = $this->db->insert("tb_food", $data);

            if ($insert) {
                // $response['status']=200;
                // $response['error']=false;
                // $response['message']='Data person ditambahkan.';
                $response=$data;
                return $response;
            } else {
                $response['status']=502;
                $response['error']=true;
                $response['message']='Data food gagal ditambahkan.';
                return $response;
            }
        }
    }

    // mengambil semua data food
    public function all_product()
    {
        $all = $this->db->get("tb_food")->result();
        // $response['status']=200;
        // $response['error']=false;
        $response =$all;
        return $response;
    }

    // hapus data person
    public function delete_product($id_food)
    {
        if ($id_food == '') {
            return $this->empty_response();
        } else {
            $where = array(
        "id_food"=>$id_food
      );

            $this->db->where($where);
            $delete = $this->db->delete("tb_food");
            if ($delete) {
                $response['status']=200;
                $response['error']=false;
                $response['message']='Data food dihapus.';
                return $response;
            } else {
                $response['status']=502;
                $response['error']=true;
                $response['message']='Data food gagal dihapus.';
                return $response;
            }
        }
    }

    // update person
    public function update_product(
        $id_food,
        $nama_food,
        $gambar_food,
        $deskripsi_food,
        $harga_food
    ) {
        if ($id_food == '' || empty($nama_food) || empty($gambar_food) || empty($deskripsi_food)|| empty($harga_food)) {
            return $this->empty_response();
        } else {
            $where = array(
        "id_food"=>$id_food
      );

            $set = array(
        "nama_food"=>$nama_food,
        "gambar_food"=>$gambar_food,
        "deskripsi_food"=>$deskripsi_food,
        "harga_food"=>$harga_food
      );

            $this->db->where($where);
            $update = $this->db->update("tb_food", $set);
            if ($update) {
                // $response['status']=200;
                // $response['error']=false;
                // $response['message']='Data product diubah.';
                $response=$where+$set;
                return $response;
            } else {
                $response['status']=502;
                $response['error']=true;
                $response['message']='Data product gagal diubah.';
                return $response;
            }
        }
    }
}
