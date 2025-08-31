<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<style>
    /* Светлая тема (по умолчанию) */
    body {
        background-color: #f5f5f5;
        color: #222;
        font-family: "Segoe UI", Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    body.dark {
        background-color: #2e0854; /* тёмно-фиолетовый фон */
        color: #f5f5f5;
    }

    /* Заголовки */
    h1, h2 {
        color: inherit;
    }

    /* Кнопки */
    .btn-purple {
        background-color: #8a2be2;
        border-color: #8a2be2;
        color: #fff;
    }

    .btn-purple:hover {
        background-color: #6a1bbf;
        border-color: #6a1bbf;
        color: #fff;
    }

    .btn-outline-purple {
        color: inherit;
        border: 2px solid currentColor;
        background-color: transparent;
    }

    .btn-outline-purple:hover {
        background-color: currentColor;
        color: #fff;
    }

    .admin-btn {
        display: flex;
        justify-content: center; /* горизонтальный центр */
        margin-top: 20px;
    }


    /* Блоки */
    .content-box {
        max-width: 800px;
        margin: 20px auto;
        padding: 30px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        text-align: justify;
    }
    body.dark .content-box {
        background-color: rgba(255, 255, 255, 0.05);
    }

</style>

<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">Hi there!</h1>
            <p class="text-center">
                <a class="btn btn-lg btn-purple" href="https://yii2.local/news">News list</a>
            </p>
        </div>
    </div>

    <div class="body-content content-box">
        <h2>Lorem ipsum</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in condimentum ex. Mauris tristique dignissim magna at venenatis. Aliquam non eros vel dui dapibus malesuada. Curabitur pretium odio diam, et dictum sapien luctus vel. Nulla sollicitudin vulputate molestie. Curabitur mollis, nisi sit amet lobortis vestibulum, odio magna suscipit purus, at auctor lectus est a risus. Aenean bibendum orci non rhoncus commodo. Nunc eu lacus erat. Quisque hendrerit velit sodales arcu facilisis porttitor a id dolor. In pellentesque dolor ac tortor consequat malesuada. Phasellus nec volutpat sem. Nulla vel vestibulum nisi. Maecenas laoreet felis eu justo malesuada vehicula. In hac habitasse platea dictumst. Maecenas condimentum porta dui in hendrerit. Ut sit amet metus a ligula volutpat lacinia non eu nunc. Donec consequat libero a risus ullamcorper, nec fermentum sem sagittis. Nulla at purus posuere, venenatis felis id, tristique velit. Aliquam pretium quam sed magna aliquet tincidunt. Sed sed blandit purus, sit amet congue orci.
        </p>
        <p class="text-center">
            <a class="btn btn-outline-purple" href="https://ru.lipsum.com/feed/html">&raquo; Learn more &raquo;</a>
        </p>
    </div>

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->username === 'admin'): ?>
        <div class="admin-btn">
            <?= \yii\helpers\Html::a('Перейти в админку', 'https://admin.yii2.local/', [
                'class' => 'btn btn-lg btn-purple',
                'target' => '_blank',
            ]) ?>
        </div>
    <?php endif; ?>
</div>
