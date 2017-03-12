//Функции для работы с разделом Блог
$(document).ready(function(){
/* Переменная-флаг для отслеживания того, происходит ли в данный момент ajax-запрос. В самом начале даем ей значение false, т.е. запрос не в процессе выполнения */
var inProgress = false;
/* С какой статьи надо делать выборку из базы при ajax-запросе */
var startFrom = 2;

    /* Используйте вариант $('#more').click(function() для того, чтобы дать пользователю возможность управлять процессом, кликая по кнопке "Дальше" под блоком статей (см. файл index.php) */
    $(window).scroll(function() {

        /* Если высота окна + высота прокрутки больше или равны высоте всего документа и ajax-запрос в настоящий момент не выполняется, то запускаем ajax-запрос */
        if($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress) {
        
        $.ajax({
            /* адрес файла-обработчика запроса */
            url: '/blog/newsAjax',
            /* метод отправки данных */
            method: 'POST',
            /* данные, которые мы передаем в файл-обработчик */
            data: {"startFrom" : startFrom},
            /* что нужно сделать до отправки запрса */
            beforeSend: function() {
            /* меняем значение флага на true, т.е. запрос сейчас в процессе выполнения */
            inProgress = true;}
            /* что нужно сделать по факту выполнения запроса */
            }).done(function(data){
            
            //$(".fa-pulse").fadeOut(1000);
            $('.fa-pulse').hide();
            /* Преобразуем результат, пришедший от обработчика - преобразуем json-строку обратно в массив */
            data = jQuery.parseJSON(data);

            /* Если массив не пуст (т.е. статьи там есть) */
            if (data.length > 0) {

            /* Делаем проход по каждому результату, оказвашемуся в массиве,
            где в index попадает индекс текущего элемента массива, а в data - сама статья */
            $.each(data, function(index, data){

            /* Отбираем по идентификатору блок со статьями и дозаполняем его новыми данными */
            $(".article").append('<h3><a href="/blog/view/' + data.id +'">' + data.title + "</a></h3>" +
                                '<p class="lead">by <a href="/blog/author/' + data.author_name + '">' + data.author_name + "</a></p>" +
                                '<p><span class="glyphicon glyphicon-time"></span> Posted on time: ' + data.date + "</p><hr>" + 
                                '<img class="img-responsive" src="http://placehold.it/900x300" alt="">' + 
                                '<p>' + data.short_content + '</p>' + 
                                '<a class="btn btn-primary" href="/blog/view/' + data.id +'">Read More <span class="glyphicon glyphicon-chevron-right"></span></a><hr>');
            });

            /* По факту окончания запроса снова меняем значение флага на false */
            inProgress = false;
            // Увеличиваем порядковый номер статьи, с которой надо начинать выборку из базы
            startFrom += 2;
            }});
        }
    });
});

