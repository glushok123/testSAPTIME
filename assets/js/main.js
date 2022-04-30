$(document).ready(function() {


    var datasend = {
        "action":"getfilm"
    };
    $.post("main.php", datasend, function(data){
        var obj = JSON.parse(data);
        obj.forEach(function(entry) {
            $('#films').append('<option value="'+entry['id']+'">'+entry['title']+'</option>');
        });

    });

    $('#films').on('change', function (e) {//Получение списка фильмов
        var valueSelected = this.value;
        var datasend = {
            "action":"getkatfilm",
            "id":valueSelected
        };
        $.post("main.php", datasend, function(data){
            $('#categ').empty();
            $('#categ').append('<option value="'+data+'">'+data+'</option>');
            $('#categ').removeAttr('disabled');
        });

        var datasend = {
            "action":"getacterfilm",
            "id":valueSelected
        };

        $.post("main.php", datasend, function(data){
            $('#actor').empty();
            var obj = JSON.parse(data);
            obj.forEach(function(entry) {
                $('#actor').append('<option value="'+entry['id']+'">'+entry['title']+'</option>');
            });
            $('#actor').removeAttr('disabled');
        });
    });

    $('.removeactor').on('click', function (e) {// Удаление актеров
        var valueSelected = $("#actor").val();
        var valueSelected2 = $("#films").val();

        if (valueSelected2.length < 1){
            swal({
                title: "Ошибка",
                text: "Необходимо выбрать фильм!",
                type: "error",
                confirmButtonColor: "#039BE5"
            })

        }


        if (valueSelected == null){
            swal({
                title: "Ошибка",
                text: "Необходимо выбрать актера!",
                type: "error",
                confirmButtonColor: "#039BE5"
            })

        }

        if (valueSelected.length== $('#actor option').length){
            swal({
                title: "Ошибка",
                text: "Необходимо что бы остался минимум 1 актер!",
                type: "error",
                confirmButtonColor: "#039BE5"
            })

        }
        else{
            $.each(valueSelected,function(index,value){
                var datasend = {
                    "action":"deleteactor",
                    "ida":value,
                    "idf":$("#films").val()

                };
                $.post("main.php", datasend, function(data){
                    $('#actor option[value="'+value+'"]').remove();
                });
            });
            swal({
                title:"Уведомление",
                text:"Успешно!",
                type:"success",
                confirmButtonColor: "#039BE5"
            });

        }
    });

    $('.addactor').on('click', function (e) {//Добавление актеров в фильм (предварительная функция)
        var valueSelected = $("#films").val();
        if (valueSelected.length < 1){
            swal({
                title: "Ошибка",
                text: "Необходимо выбрать фильм!",
                type: "error",
                confirmButtonColor: "#039BE5"
            })

        }
        else{
            var datasend = {
                "action":"addactors",
                "idf":valueSelected
            };

            $.post("main.php", datasend, function(data){
                $('#addactors').empty();
                var obj = JSON.parse(data);
                obj.forEach(function(entry) {
                    $('#addactors').append('<option value="'+entry['id']+'">'+entry['title']+'</option>');
                });
            });
            $('#modaladdactor').modal('show');
        }
    });

    $('.closemodal').on('click', function (e) {//Закрытие модального окна
        $('#modaladdactor').modal('hide');
    });

    $('.closemodalcop').on('click', function (e) {//Закрытие модального окна
        $('#modalcopactor').modal('hide');
    });

    $('.addactorinfilm').on('click', function (e) {//Добавление актеров в фильм
        let valueSelected = $("#addactors").val();
        let name_actor = $("#addactors option[value='"+valueSelected+"']").text();

        if (valueSelected.length < 1){
            swal({
                title: "Ошибка",
                text: "Необходимо выбрать актера!",
                type: "error",
                confirmButtonColor: "#039BE5"
            })

        }
        else{
            var prov = 0;
            $("#actor option").each(function()
            {
                 if ( $(this).val() == valueSelected){
                     swal({
                         title: "Ошибка",
                         text: "Такой актер уже есть!",
                         type: "error",
                         confirmButtonColor: "#039BE5"
                     })


                     prov = 1;
                 }
            });

            if ($('#actor option').length== 15){
                swal({
                    title: "Ошибка",
                    text: "Нельзя добавить больше 15 актеров!",
                    type: "error",
                    confirmButtonColor: "#039BE5"
                })

               prov = 1;
            }

            if (prov == 1){
                 return;
            }

                var datasend = {
                    "action":"addactorinfilm",
                    "ida":valueSelected,
                    "idf":$("#films").val()
                };

                $.post("main.php", datasend, function(data){
                    $('#actor').append('<option value="'+valueSelected+'">'+name_actor+'</option>');
                    $('#modaladdactor').modal('hide');
                    swal({
                        title:"Уведомление",
                        text:"Актер добавлен!",
                        type:"success",
                        confirmButtonColor: "#039BE5"
                    });
                
                });

        }


    });

    $('.actorcop').on('click', function (e) {//Копирование актеров предварительная функция
        var valueSelected = $("#films").val();
        if (valueSelected.length < 1){
            swal({
                title: "Ошибка",
                text: "Необходимо выбрать фильм!",
                type: "error",
                confirmButtonColor: "#039BE5"
            })

        }
        else{
            var datasend = {
                "action":"getfilm"
            };

            $.post("main.php", datasend, function(data){
                $('#copactors').empty();
                var obj = JSON.parse(data);
                obj.forEach(function(entry) {
                    $('#copactors').append('<option value="'+entry['id']+'">'+entry['title']+'</option>');
                });
            });
            $('#modalcopactor').modal('show');
        }
    });

    $('.copactorinfilm').on('click', function (e) {//Копирование актеров

        var valueSelected = $("#copactors").val();
        if (valueSelected == null){
            swal({
                title: "Ошибка",
                text: "Необходимо выбрать фильм!",
                type: "error",
                confirmButtonColor: "#039BE5"
            })
        }

        else{
                var datasend = {
                    "action":"colactor",
                    "id":valueSelected
                };

                $.post("main.php", datasend, function(data){
                    if ((data == 15) || ((Number(data) + $('#actor option').length)>=15) ){
                        swal({
                            title: "Ошибка",
                            text: "Ошибка! Нельзя добавить больше 15 актеров в 1 фильм! Сначала удалите актеров из фильма в который хотите добавить!",
                            type: "error",
                            confirmButtonColor: "#039BE5"
                        })

                    }
                    else{
                        var valueSelected = $("#actor").val();
                        $("#actor option").each(function()
                        {
                            var datasend = {
                                "action":"addactorinfilm",
                                "ida":$(this).val(),
                                "idf":$("#copactors").val()

                            };

                            $.post("main.php", datasend, function(data){
                                console.log("ok");
                            });

                        });
                        $('#modalcopactor').modal('hide');
                        swal({
                            title:"Уведомление",
                            text:"Актеры добавлены!",
                            type:"success",
                            confirmButtonColor: "#039BE5"
                        });

                    }
                });
        }
    });

});
