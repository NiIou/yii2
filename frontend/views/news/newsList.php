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
        }

        .news-container {
            max-width: 900px;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }

        .card:nth-child(1) {
            animation-delay: 0.1s;
        }
        .card:nth-child(2) {
            animation-delay: 0.2s;
        }
        .card:nth-child(3) {
            animation-delay: 0.3s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .time {
            font-size: 0.9rem;
            color: #888;
            margin-bottom: 0.5rem;
        }

        .title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 0.8rem;
        }

        .content {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
        }
    </style>
</head>
<body>

<div class="news-container">
    <?php
    use yii\helpers\Url;
    foreach ($news as $item):
        ?>
        <div class="card">
            <div class="time">🕒 <?= htmlspecialchars($item['time']) ?></div>

            <div class="title"><a href="<?php echo Url::to(["news/view" , 'id' => $item["id"]]) ?>"><?= $item['title'] ?></a></div>

            <div class="content"><?= nl2br(htmlspecialchars($item['content'])) ?></div>
        </div>
    <?php endforeach; ?>
</div>
<div style="text-align:center; margin-top:20px;">
    <?= \yii\helpers\Html::a('Вернуться на сайт', 'https://yii2.local/', [
        'class' => 'btn btn-lg btn-success',
        'target' => '_self',
    ]) ?>
</div>


</body>
</html>
