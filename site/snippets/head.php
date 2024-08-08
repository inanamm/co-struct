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
    <script id="google-analytics" async type="text/plain" data-category="measurement">
            console.log("test");
          </script>

    <script type="text/plain" data-category="measurement" data-service="Google Analytics">

            function setCookie(name, value, days, path) {
              let expires = "";
              if (days) {
                  const date = new Date();
                  date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                  expires = "; expires=" + date.toUTCString();
              }
              document.cookie = name + "=" + (value || "") + expires + "; path=" + (path || "/");
            }

            setCookie("testCookie", "testValue", 7);
            setCookie("_ga", "GA1.2.123456789.123456789", 365); 
          </script>
  <?php endif; ?>

  <?= vite()->css('index.css') ?>

</head>