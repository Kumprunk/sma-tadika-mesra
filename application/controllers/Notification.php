<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// cek_login();
		$midtrans = $this->Mcustom->general();
		if ($midtrans['status'] == 'TRUE') {
			$params = array('server_key' => $midtrans['server_key'], 'production' => TRUE);
		} elseif ($midtrans['status'] == 'FALSE') {
			$params = array('server_key' => $midtrans['server_key'], 'production' => FALSE);
		}
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
	}

	public function index()
	{
		echo 'test notification handler';
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result);

		if ($result) {
			$notif = $this->veritrans->status($result->order_id);
		}

		error_log(print_r($result, TRUE));

		$transaction = $notif->transaction_status;
		$type = $notif->payment_type;
		$order_id = $notif->order_id;
		$fraud = $notif->fraud_status;
		$status_code = $notif->status_code;

		//notification handler sample
		if ($status_code == 200) {
			$this->db->set('status_kode', $status_code);
			$this->db->where('order_id', $order_id);
			$this->db->update('b_tagihan');
		} elseif ($status_code == 201) {
			$this->db->set('status_kode', $status_code);
			$this->db->where('order_id', $order_id);
			$this->db->update('b_tagihan');
		} elseif ($status_code == 202) {
			$updateTagihan = [
				'status_kode'	=> 0,
				'order_id'		=> '',
				'transaksi_id'	=> '',
				'jumlah'		=> 0,
				'tipe_transaksi' => '-',
				'wkt_transaksi' => '0000-00-00 00:00:00',
				'wkt_kadaluarsa' => '0000-00-00 00:00:00',
				'bank'			=> '-',
				'va_numbers'	=> '',
				'biller_code'	=> '',
				'pdf_url'		=> '',
				'telp'			=> '',
				'email'			=> '',
				'penerima'		=> '',
				'catatan'		=> 'transaksi gagal',
			];
			$this->db->where('order_id', $order_id);
			$this->db->update('b_tagihan', $updateTagihan);
		} else {
			$this->db->set('status_kode', $status_code);
			$this->db->where('order_id', $order_id);
			$this->db->update('b_tagihan');
		}







		/*
		$transaction = $notif->transaction_status;
		$type = $notif->payment_type;
		$order_id = $notif->order_id;
		$fraud = $notif->fraud_status;

		if ($transaction == 'capture') {
		  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
		  if ($type == 'credit_card'){
		    if($fraud == 'challenge'){
		      // TODO set payment status in merchant's database to 'Challenge by FDS'
		      // TODO merchant should decide whether this transaction is authorized or not in MAP
		      echo "Transaction order_id: " . $order_id ." is challenged by FDS";
		      } 
		      else {
		      // TODO set payment status in merchant's database to 'Success'
		      echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
		      }
		    }
		  }
		else if ($transaction == 'settlement'){
		  // TODO set payment status in merchant's database to 'Settlement'
		  echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
		  } 
		  else if($transaction == 'pending'){
		  // TODO set payment status in merchant's database to 'Pending'
		  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
		  } 
		  else if ($transaction == 'deny') {
		  // TODO set payment status in merchant's database to 'Denied'
		  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
		}*/
	}
}
