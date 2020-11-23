<?php
require "../library/model/ourModel.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $obj = new ourModel();
    $did= $_POST['ids'];
    $tnight= $_POST['tnight'];
    $rprice= $_POST['rprice'];
    $amount = $_POST['rtotal'];

    $tamount = ($rprice * $tnight);
    $did = implode(",", $did);
    

	$results = $obj->raw("select * from dining_items where id in ({$did})");

	if($results->num_rows > 0){
		while ($d= $results->fetch_object()) {
			$tamount += $d->amount*$tnight;
		}
	}

	echo $tamount;
}