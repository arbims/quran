<!-- app/Views/swagger/index.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Swagger UI</title>
    <link rel="stylesheet" type="text/css" href="/css/swagger-ui.css">
    <style>
        .main a {
            display: block;
            background: #d63c44;
            border-radius: 5px;
            padding: 20px;
            margin: 10px 0px;
            color: #FFF !important;
            font-size: 22px !important;
        }
    </style>
</head>
<body>
<img src="https://upload.wikimedia.org/wikipedia/fr/7/73/Cakephp_logo.png" style="max-width: 100px;">
<div id="swagger-ui"></div>

<script src="/js/swagger-ui-bundle.js"></script>
<script src="/js/swagger-ui-standalone-preset.js"></script>
<script>
    window.onload = function () {
        // Begin Swagger UI call region
        const ui = SwaggerUIBundle({
            url: "/swagger_json.json",
            dom_id: "#swagger-ui",
            presets: [SwaggerUIBundle.presets.apis],
        });
        // End Swagger UI call region

        window.ui = ui;
    };
</script>
</body>
</html>
