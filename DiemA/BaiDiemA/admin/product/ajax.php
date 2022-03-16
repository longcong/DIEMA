<?php
require_once ('../../database/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['ProductId'])) {
					$ProductId = $_POST['ProductId'];

					$sql = 'delete from products where ProductId= '.$ProductId;
					execute($sql);
				}
				break;
		}
	}
}