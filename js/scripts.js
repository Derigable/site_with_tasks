$(document).ready(function () { 
    
    // Делаем сортировку и пагинацию
    $('#table_main').DataTable({
        "lengthChange": false,
        "pageLength": 3,
        "searching": false
    });

    // Если авторизован под админом, то прячем окно авторизации и показываем кнопку чтобы разлогиниться
    $.ajax({
        url:'login/session_check',
        method:"POST",
        success:function(data){  
            if (data == "Active") {
                $("#autorization").hide();
                $("#logoff").removeClass("d-none");
                $(":checkbox").removeClass("d-none");
            } 
        }
    });

    $(".paginate_button").click(function(){
        $(":checkbox").removeClass("d-none");
    });

    // Разлогиниваем по клику на кнопку
    $("#logoff").click(function() {
        $.ajax({
           url:'login/logout'
        });
    });

    // Изменяем статус задачи по клику на чекбокс
    $(":checkbox").click(function() {
        $.ajax({
            url:'main/status_change',
            method:"POST",
            data: ({task_id: this.id})
        });
    });

});



