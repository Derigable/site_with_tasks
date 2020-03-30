<h1>Добавление новой задачи</h1>
<p>
    <form method="post" action="task/send" autocomplete="off">
        <div class="form-group">
            <div class="col-auto">
                <label for="name">Имя пользователя:</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus autocomplete="no"/><br />
            </div>
            <div class="col-auto">
                <label for="email">Адрес электронной почты:</label>
                <input type="email" class="form-control" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="name@example.com" autocomplete="no"/><br />
            </div>
        </div>
        <div class="form-group">
            <div class="col-auto">
                <label for="task">Текст задачи:</label>
                <input type="text" class="form-control" id="task" name="task" required/><br/>
            </div>
        </div>
        <div class="text-center">
            <button id="123" type="submit" class="btn btn-primary" value="Создать задачу" name="submit">Создать задачу</button>
        </div>
    </form>
</p>

