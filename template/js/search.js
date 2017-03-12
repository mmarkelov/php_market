//$(function(){
//	    
//	//Живой поиск
//	$('.search').bind("change keyup input click", function() {
//	    if(this.value.length >= 2){
//	        $.ajax({
//	            type: 'post',
//	            url: "/search", //Путь к обработчику
//	            data: {'referal':this.value},
//	            response: 'text',
//	            success: function(data){
//	                $(".search_result").html(data).fadeIn(); //Выводим полученые данные в списке
//	           }
//	       })
//	    }
//	})
//	    
//	$(".search_result").hover(function(){
//	    $(".search").blur(); //Убираем фокус с input
//	})
//	    
//	//При выборе результата поиска, прячем список и заносим выбранный результат в input
//	$(".search_result").on("click", "li", function(){
//	    s_user = $(this).text();
//	    //$(".who").val(s_user).attr('disabled', 'disabled'); //деактивируем input, если нужно
//	    $(".search_result").fadeOut();
//	})
//	
//	})

$('.search').autocomplete({
    source: function(request, response){
        $.ajax({
            type: 'POST',
	    url: "/search", //Путь к обработчику
            dataType: 'json',
            data:{
                maxRows: 10, // показать первые 12 результатов
                nameStartsWith: request.term // поисковая фраза
            },
            success: function(data){
                response($.map(data, function(item){
                    return {
                        link: item.id, // ссылка на страницу товара
                        label: item.name // наименование товара
                    }
                }));
            }
        });
    },
    select: function( event, ui ) {
        // по выбору - перейти на страницу товара
        location.href = "/product/"+ui.item.link;
        //console.log(ui.item.link);
        return false;
    },
    minLength: 2,
    autoFocus: true,
    
});