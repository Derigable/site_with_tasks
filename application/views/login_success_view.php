<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Задачи</title>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
		<script src="/js/scripts.js" type="text/javascript"></script>		
    </head>
    <body>
		<header>
			<button class="btn btn-lg"><a href="/">Главная</a></button>
			<button class="btn btn-lg"><a href="/task">Новая задача</a></button>
			<button id="logoff" class="btn btn-lg"><a href=>Разлогиниться</a></button>
		</header>
    </body>
</html>

<div class="text-center text-success mt-5 h3">
    <?php echo($data); ?>   
</div>  

