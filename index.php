<?php 

    // bypassing cors block
	if (isset($_POST['getdata'])) {
        //echo '2';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $_POST['getdata']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$data = curl_exec($ch);
		curl_close($ch);
		echo $data;
		exit();
	}
    
	$default_lang = 'en';

	if (isset($_GET['lang'])) {
		//setcookie("default_lang", $_GET['lang']);
		$default_lang = $_GET['lang'];
	}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <?php if ($default_lang == 'fr'): ?>
    <title>Base de données sur les fromages</title>
    <?php else: ?>
    <title>Cheease database</title>
    <?php endif ?>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">
    <script type="text/javascript">
    let default_lang = '<?php echo $default_lang; ?>';
    </script>
    <style type="text/css">
    table.dataTable thead th {
        white-space: nowrap;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <?php if ($default_lang == 'fr'): ?>
            <a class="navbar-brand" href="#">Base de données sur les fromages canadiens</a>
            <?php else: ?>
            <a class="navbar-brand" href="#">Canadian Cheese Database</a>
            <?php endif ?>
            <div class="dropdown my-2">
                <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Languages -
                    <?php echo strtoupper($default_lang); ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="index.php?lang=en">English</a>
                    <a class="dropdown-item" href="index.php?lang=fr">Français</a>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
<?php if ($default_lang == 'fr'): ?>
        <h1 style="margin: 20px;text-align: center; width: 100%;">Base de données sur les fromages canadiens</h1>
<?php else: ?>
<h1 style="margin: 20px;text-align: center; width: 100%;">Canadian Cheese Database</h1>
<?php endif ?>
        <div class="row">
            <table id="datas" class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Manufacturer</th>
                        <th>Man. Prov Code</th>
                        <th>Man Type</th>
                        <th>% Fat</th>
                        <th>% Moisture</th>
                        <th>Flavour</th>
                        <th>Characteristics</th>
                        <th>Ripening</th>
                        <th>Organic</th>
                        <th>Category</th>
                        <th>Milk Type</th>
                        <th>Milk Treatment</th>
                        <th>Rind Type</th>
                        <th>Last Update Date</th>
                        <th>Website</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>
