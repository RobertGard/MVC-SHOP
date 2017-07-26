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

/**
 * Получение данных из input,textarea,select
 * 
 * @param {type} block - id или class блока 
 * @returns {unresolved}
 */
function getData(block){
    var hData ={};
    $('input,textarea,select',block).each(function(){
        if(this.name && this.name !== ''){
            hData[this.name] = this.value;
            console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }
    });
    return hData;
};

function ShowAndHide(idBlock){
            $(idBlock).toggle('slow');
}

/**
 * Регистрация нового пользователя
 * 
 * @param {type} idBox
 * @returns {undefined}
 */
function signUp(idBox){
   var dataFromBox = getData(idBox);
    
    $.ajax({
        type: 'POST',
        async: false,
        url: "/?controller=user&action=signup",
        data: dataFromBox,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                location.reload();
                alert(data['message']);
            }else{
                alert(data['message']);
            }
        }
    });
    
}

/**
 * Залогиниться используя email и пароль
 * 
 * @param {type} idBox
 * @returns {undefined}
 */
function signIn(idBox){
    var dataFromBox = getData(idBox);
    
    $.ajax({
        type: 'POST',
        async: false,
        url: '/?controller=user&action=signin',
        data: dataFromBox,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                location.reload();
            }else{
                alert(data['message']);
            }}
    });
}

/**
 * 
 * @param {type} idBox
 * @returns {undefined}
 */
function updateDetailsUser(idBox){
    var dataFromBox = getData(idBox);
    
    $.ajax({
        type: 'POST',
        async: false,
        url: '/?controller=user&action=update',
        data: dataFromBox,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                location.reload();
                alert(data['message']);
            }else{
                alert(data['message']);
            }}
    });
}