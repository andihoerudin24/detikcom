<?php

class Transaksi_model
{


    protected $tables = 'transaction';
    protected $tables_views = 'v_transaction';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getTransaction()
    {
        $this->db->query("SELECT * FROM $this->tables");
        return $this->db->resultSet();
    }

    public function add($data)
    {
        $query = "INSERT INTO $this->tables (`transaction_id`, `invoice_id`, `item_name`, `amount`, `payment_type`, `merchant_id`, `references_id`, `number_va`, `status`) VALUES (NULL, '" . $data['invoice_id'] . "', '" . $data['item_name'] . "', '" . $data['amount'] . "', '" . $data['payment_type'] . "', '" . $data['merchant_id'] . "', '" . rand(1, 100) . "', '" . rand(1, 100) . "', 'Pending');";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getStatusTransaski($refid, $mercentid)
    {
        $this->db->query("SELECT vt.references_id,vt.merchant_name,vt.status,vt.invoice_id FROM v_transaction as vt WHERE vt.references_id=$refid AND vt.merchantid=$mercentid ");
        return $this->db->single();
    }


    public function lastdata()
    {
        $this->db->query("SELECT tr.references_id,tr.status,tr.number_va FROM $this->tables as tr ORDER BY tr.transaction_id DESC LIMIT 1");
        return $this->db->single();
    }

    public function update($data)
    {
        $query = "UPDATE $this->tables SET `status` = '".$data['status']."' WHERE $this->tables.`invoice_id` = '".$data['invoice_id']."' ";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function lastupdate($data)
    {
        $query = "SELECT tr.invoice_id, tr.references_id,tr.status,tr.number_va,tr.status FROM $this->tables as tr where tr.invoice_id='".$data['invoice_id']."'";
        $this->db->query($query);
        return $this->db->single();
    }
}
