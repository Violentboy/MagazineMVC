{foreach $rsProduct as $item name=productId}
    
<h3>{$item['name']}</h3>

<img width="575" src="/images/products/{$item['image']}">
Стоимость: {$item['price']}

<a href="#" alt='Добавить в корзину'>Добавить в корзину</a>
<p> Описание <br/>{$item['description']}</p>


{/foreach}