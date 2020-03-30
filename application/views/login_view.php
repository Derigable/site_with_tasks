<?php if (!isset($_SESSION["username"])) {?>
<h1 class="text-center">Авторизация</h1>

<form method="post" action="login/login" autocomplete="off">
    <div class="form-group">
        <div class="col-auto">
            <label for="name">Логин:</label>
            <input type="text" class="form-control" id="name" name="name" required autofocus autocomplete="no"/><br />
        </div>
        <div class="col-auto">
            <label for="password">Пароль:</label>
            <input type="password" class="form-control" id="password" name="password" required autocomplete="no"/><br />
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary" value="Авторизоваться" name="submit">Авторизоваться</button>
    </div>
</form>
<?php } ?>

<div class="text-center <?php if ($data === 'Неправильно указаны реквизиты доступа') {?> text-danger <?php } else {?> text-success <?php } ?>">
    <?php echo($data); ?>   
</div>  