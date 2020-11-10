<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=vitfam', 'fam', 'fam123');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$site='http://localhost/vitfam-ini';