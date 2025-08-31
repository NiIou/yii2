<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <style>
        /* Светлая тема по умолчанию */
        body {
            background-color: #f5f5f5;
            color: #222;
            transition: background 0.3s, color 0.3s;
        }

        body.dark {
            background-color: #2e0854; /* тёмно-фиолетовый фон */
            color: #f5f5f5;
        }

        .theme-toggle-btn {
            border: 1px solid #ccc;
            background: transparent;
            color: inherit;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        .theme-toggle-btn:hover {
            background: rgba(255,255,255,0.2);
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);

    // Кнопка переключения темы 🌙/☀️
    echo Html::button('🌙/☀️', [
        'id' => 'theme-toggle-btn',
        'class' => 'theme-toggle-btn ms-2'
    ]);

    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',
            Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),
            ['class' => ['d-flex']]
        );
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex ms-2'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php
$script = <<<JS
function setTheme(theme) {
    document.body.classList.toggle('dark', theme === 'dark');
    document.cookie = "theme=" + theme + "; path=/; max-age=" + (60*60*24*365);
}

function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\\.\$?*|{}()\\[\\]\\\\\\/\\+^])/g, '\\\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

// применяем сохранённую тему при загрузке
let savedTheme = getCookie('theme');
if (savedTheme) {
    setTheme(savedTheme);
}

document.getElementById('theme-toggle-btn').addEventListener('click', function() {
    let current = document.body.classList.contains('dark') ? 'dark' : 'light';
    let newTheme = current === 'dark' ? 'light' : 'dark';
    setTheme(newTheme);
});
JS;
$this->registerJs($script);
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage(); ?>
