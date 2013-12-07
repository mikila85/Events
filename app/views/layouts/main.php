<!DOCTYPE html>
<html>
<head>
<script src="<?= asset('js/jQuery/jquery-1.10.2.min.js'); ?>"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link href="/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/css/responsive.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/js/tabcontent.js"></script>
</head>
<body>
<?= View::make("layouts.header"); ?>
<?= $content; ?>
<?= View::make("layouts.footer"); ?>
</body>
</html>
