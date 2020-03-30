<h1 class="text-center">Добро пожаловать!</h1>

<p>
<table id="table_main" class="table table-striped table-bordered">
<thead class="thead-dark">
    <tr>
      <th class="thead">Имя</th>
      <th class="thead">Email</th>
      <th class="thead">Задача</th>
      <th class="thead">Статус</th>
    </tr>
  </thead>
<?php 

    foreach($data as $row)
	{
		echo '<tr><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td>'.$row['task_description']."</td><td id=".$row['id'].">".$row['status'].'<input type="checkbox" class="dt-checkboxes ml-4 d-none" id='.$row['id'].' /></td></tr>';
	}
?>
</table>
</p>
