/**
 * Функция добавления товара в корзину
 * 
 * @param integer itemId ID продукта
 * @return в случае успеха обновятся данные на странице
 */
function addToCart(itemId){
    console.log("js - addToCart()");
    $.ajax({
        type: 'POST',
       // async: true,
        url: "/cart/addtocart/" + itemId,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#cartCntItems').html(data['cntItems']);
                $('#addCart_'+ itemId).hide();
                $('#removeCart_'+ itemId).show();
            }
        }
    });
}

/**
 * Функция удаления товара в корзину
 * 
 * @param integer itemId ID продукта
 * @return в случае успеха удалятся данные на странице
 */
function removeFromCart(itemId){
    console.log("js - removeFromCart("+itemId+")");
    $.ajax({
        type: 'POST',
       // async: true,
        url: "/cart/removefromcart/" + itemId,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#cartCntItems').html(data['cntItems']);
                $('#addCart_'+ itemId).show();
                $('#removeCart_'+ itemId).hide();
            }
        }
    })
}