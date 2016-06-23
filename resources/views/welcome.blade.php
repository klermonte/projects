<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>api</title>
    <link rel="stylesheet" href="/styles/api-console-light-theme.css" type="text/css" />
</head>
<body ng-app="ramlConsoleApp" ng-cloak>

<raml-console-loader src="/raml/main.yaml"></raml-console-loader>
{{--<raml-initializer></raml-initializer>--}}
<script src="/scripts/api-console-vendor.js"></script>
<script type="text/javascript" src="/scripts/api-console.js"></script>
<script type="text/javascript">
    $.noConflict();
</script>
</body>
</html>
