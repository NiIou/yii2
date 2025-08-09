<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новость</title>
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background: #f4f5f7;
            margin: 0;
            padding: 2rem;
        }

        .news-single {
            max-width: 800px;
            margin: auto;
            background: #fff;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease-out forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .news-time {
            font-size: 0.9rem;
            color: #888;
            margin-bottom: 0.7rem;
        }

        .news-title {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
            color: #222;
        }

        .news-content {
            font-size: 1.05rem;
            line-height: 1.7;
            color: #444;
        }
    </style>
</head>
<body>

<div class="news-single">
    <div class="news-time">🕒 <?= htmlspecialchars($news['time']) ?></div>
    <div class="news-title"><?= htmlspecialchars($news['title']) ?></div>
    <div class="news-content"><?= nl2br(htmlspecialchars($news['content'])) ?></div>
    <a href="<?= \yii\helpers\Url::toRoute(['news/index']) ?>"
       style="
    display: inline-block;
    padding: 0.6rem 1.2rem;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-size: 1rem;
    margin-top: 1.5rem;
">← Назад</a>

</div>

</body>
</html>
