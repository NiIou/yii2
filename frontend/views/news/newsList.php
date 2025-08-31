<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background: #f0f2f5;
            padding: 2rem;
            margin: 0;
            transition: background 0.3s ease;
        }

        .news-container {
            max-width: 900px;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card {
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background: #fff;
            color: #333;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .time {
            font-size: 0.9rem;
            color: #888;
            margin-bottom: 0.5rem;
        }

        .title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.8rem;
        }

        .content {
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Тёмная тема */
        body.dark {
            background: #2e0854;
        }
        body.dark .card {
            background: #8A2BE2FF;
            color: #fff;
        }
        body.dark .time {
            color: #ddd;
        }
        body.dark .title {
            color: #fff;
        }
        body.dark .content {
            color: #f0f0f0;
        }

        /* Кнопка переключения темы */
        .theme-toggle {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 20px;
            background: #8A2BE2;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
        }
        /* Ссылки в светлой теме */
        a {
            color: #8A2BE2; /* фиолетовый */
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }

        /* Ссылки в тёмной теме */
        body.dark a {
            color: #ecebeb; /* золотой (на фиолетовом фоне лучше видно) */
        }
        body.dark a:hover {
            text-decoration: underline;
        }


    </style>


</head>
<body>

<div class="news-container">
    <?php
    use yii\helpers\Url;
    foreach ($news as $item): ?>
        <div class="card">
            <div class="time">🕒 <?= htmlspecialchars($item['time']) ?></div>
            <div class="title">
                <a href="<?php echo Url::to(["news/view" , 'id' => $item["id"]]) ?>">
                    <?= $item['title'] ?>
                </a>
            </div>
            <div class="content"><?= nl2br(htmlspecialchars($item['content'])) ?></div>
        </div>
    <?php endforeach; ?>
</div>

<div style="text-align:center; margin-top:20px;">
    <?= \yii\helpers\Html::a('Вернуться на сайт', 'https://yii2.local/', [
        'class' => 'btn btn-lg',
        'style' => 'background-color:#8A2BE2; color:#fff; border:none;',
        'target' => '_self',
    ]) ?>
</div>

</body>
</html>
