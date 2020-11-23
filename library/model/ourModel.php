<?php

class ourModel
{
    public $ID;
    private $db;

    function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "hotel_management");
    }

    public function insert($table, $data)
    {
        $sql = "";
        foreach ($data as $key => $value) {
            if ($sql != "") {
                $sql .= ", ";
            }
            $sql .= "{$key} ='" . $this->help($value) . "'";
        }

        $sql = "insert into {$table} set {$sql}";
//       echo $sql;

        if ($this->db->query($sql)) {
            $this->ID = $this->db->insert_id;
            return true;
        } else {
            $this->db->error;
            return false;
        }

    }

    private function help($data)
    {

        return $this->db->real_escape_string($data);
    }

    public function view($table, $select, $order = "", $where = "", $rel = "")
    {

        $sqlorder = "";
        $sqlwhere = "";
        $sqlrel = "";

        $sql = "select {$select} from {$table}";

        if ($order) {

            $sqlorder = " order by {$order[0]} {$order[1]}";
        }
        if ($where) {

            foreach ($where as $key => $value) {

                if ($sqlwhere) {

                    $sqlwhere .= " and ";
                } else {

                    $sqlwhere = " where ";
                }

                $sqlwhere .= "{$key}='" . $value . "'";
            }
        }
        if ($rel) {

            foreach ($rel as $key => $value) {

                if ($sqlrel) {

                    $sqlrel .= " and ";
                } elseif (!$sqlwhere) {

                    $sqlrel = " where ";
                } elseif (!$sqlrel && $sqlwhere) {

                    $sqlrel = " and ";
                }

                $sqlrel .= "{$key}={$value} ";
            }
        }

        $sql = $sql . $sqlwhere . $sqlrel . $sqlorder;
        //echo $sql;
        $results = $this->db->query($sql);
        return $results;

    }

    public function update($table, $data, $where)
    {
        $sql = "";
        $sqlwhere = "";
        foreach ($data as $key => $value) {
            if ($sql != "") {
                $sql .= ", ";
            }
            $sql .= "{$key} ='" . $this->help($value) . "'";
        }
        if ($where) {

            foreach ($where as $key => $value) {

                if ($sqlwhere) {

                    $sqlwhere .= " and ";
                } else {

                    $sqlwhere = " where ";
                }

                $sqlwhere .= "{$key}='" . $value . "'";
            }
        }

        $sql = "update {$table} set {$sql} {$sqlwhere}";
        //echo $sql;
        $this->db->query($sql);
        if ($this->db->affected_rows > -1) {
            return true;
        } else {
            return false;
        }

    }

    public function delete($table, $where)
    {
        $sql = "";
        $sqlwhere = "";

        if ($where) {
            foreach ($where as $key => $value) {

                if ($sqlwhere) {
                    $sqlwhere .= " and ";
                } else {
                    $sqlwhere = " where ";
                }

                $sqlwhere .= "{$key}='" . $value . "'";
            }
        }

        $sql = "delete from {$table} {$sqlwhere}";
//        echo $sql;
        $this->db->query($sql);
        if ($this->db->affected_rows) {
            return true;
        } else {
            return false;
        }

    }

    public function raw($sql)
    {
        // echo $sql;
        return $this->db->query($sql);
    }


}
