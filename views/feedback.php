<h3>Отзывы</h3>

<?php foreach ($feedback as $item):?>
    <div>
        <p>автор: <?=$item['name']?></p>
        <p>отзыв: <?=$item['feedback']?></p>
    </div>
<?php endforeach;?>
