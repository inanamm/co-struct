<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, shrink-to-fit=no" />

  <?php snippet('seo/head'); ?>
  <?php header("Cache-Control: max-age=3600"); ?>

  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="language" content="Deutsch, Francais">

  <?php snippet('cookieconsentCss') ?>

  <?php if ($kirby->option('analytics', false)): ?>
    <script id="google-analytics" async src="https://www.googletagmanager.com/gtag/js?id=G-L8GEECWSV2" type="text/plain"
      data-category="measurement"></script>

    <script type="text/plain" data-category="measurement" data-service="Google Analytics">
      window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'G-L8GEECWSV2');
    </script>
  <?php endif; ?>

  <?= vite()->css('index.css') ?>

</head>