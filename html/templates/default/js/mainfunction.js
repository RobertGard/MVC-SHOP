/* 
 * Главные js функции 
 */

/**
 * Добавление товара в корзину
 * 
 * @param {type} itemId
 * @returns {undefined}
 */
function addToCart(itemId){
    $.ajax({
        type: 'POST',
        async: false,
        url: '/?controller=cart&action=addtocart&id='+itemId,
        dataType: 'json',
        success:function(data){
            if(data['success']){
                //Вывод количества товаров в блок корзины в хедере
                cartCntItems = data['cntCartItem']+1;
                if(cartCntItems===1){
                    $('#cartBox').html(cartCntItems + " Товар");
                }else if(cartCntItems < 4){
                    $('#cartBox').html(cartCntItems + " Товара");
                }else{
                    $('#cartBox').html(cartCntItems + " Товаров");
                }
                
                $('.addToCart_'+itemId).hide();
                $('.removeCart_'+itemId).show();
            }else{
                alert(data['message']);
            }
        }
    });
}

/**
 * Удаляет товар из корзины
 * 
 * @param {type} itemId
 * @returns {undefined}
 */
function removeCart(itemId){
    $.ajax({
        type: 'POST',
        async: false,
        url: "/?controller=cart&action=removefromcart&id="+itemId,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#cartBox').html(data['cntCartItem'] + " Товар");
                
                $('.removeCart_'+itemId).hide();
                $('.addToCart_'+itemId).show();
            }else{
                alert("Всё плохо !");
            }
        }
        
    });
    
}