// Если сделать обычную обертку $(document).ready(function то будут конфликты
jQuery(function ($) { $(document).ready(function () {
 
    // Делаем сортировку и пагинацию
    $('#table_main').DataTable({
        "lengthChange": false,
        "pageLength": 3,
        "searching": false
    });


    // Разлогиниваем по клику на кнопку
    $("#logoff").click(function() {
        $.ajax({
           url:'login/logout'
        });
    });

})});

 // Если авторизован под админом, то прячем окно авторизации и показываем кнопку чтобы разлогиниться, также показываем чекбоксы и кнопку для редактирования задачи
 $.ajax({
    url:'login/session_check',
    method:'POST',
    success:function(data){  
        if (data == "Active") {
            $("#autorization").hide();
            $("#logoff").removeClass("d-none");
            $(":checkbox").removeClass("d-none");
            $("button.btn.btn-secondary.btn-sm.ml-4").removeClass("d-none");
        } 
    }
});


// Отправляем новый текст задачи в бд, предварительно проверяя является ли пользователь админом
function edit_task(button_id){
    let new_task = $("#" + button_id).prev()[0].value;
    let task_changed = 1;
    $.ajax({
        url:'login/session_check',
        method:'POST',
        success:function(data) {
            if (data == 'Expired') {
                alert("Ваша сессия истекла, авторизуйтесь заново");
            } else if (data = 'Active') {
                $.ajax({
                    url:'task/edit_task',
                    method:'POST',
                    data: ({id: button_id, task: new_task, task_changed: task_changed}),
                    success:function(data) {
                        alert(data);
                    }
                });
            }
        }
    });

};


$(document).ready(function () {
    // Изменяем статус задачи по клику на чекбокс, проверяя админ ли это
    $(":checkbox").click(function() {
        let task_id = this.id;
        $.ajax({
            url:'login/session_check',
            method:'POST',
            success:function(data) {
                if (data == 'Expired') {
                    alert("Ваша сессия истекла, авторизуйтесь заново");
                } else if (data = 'Active') {
                    $.ajax({
                        url:'main/status_change',
                        method:"POST",
                        data: ({task_id: task_id})
                    });  
                }
            }
        });  
    });


    // При клике на кнопку даем возможность изменить текст задачи
    $("button.btn.btn-secondary.btn-sm.ml-4").click(function() {
        $(this).removeClass("btn-secondary").addClass("btn-success").attr('onclick', 'edit_task( '+ this.id +')');
        $(this).html('Сохранить');
        // Получаем текст задачи
        let text = $(this).parent().html();
        let regex = '.+?(?=<button type="button" id="';
        let myReg = new RegExp(regex + this.id + '" class="btn btn-sm ml-4 btn-success")');
        let td_value = text.match(myReg);
        let button_html = text.substr(td_value[0].length);
        console.log(button_html);
        $(this).parent().html(button_html).prepend('<input type="text" value="' + td_value[0] + '"/>');
    });

});