<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Dev Mode | Coordinates Finder</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body, html { margin: 0; padding: 0; overflow: hidden; background: #050505; }
        #three-container { position: absolute; top: 0; left: 0; width: 100vw; height: 100vh; }
        .hud-grid { position: fixed; top: 0; left: 0; right: 0; bottom: 0; pointer-events: none; z-index: 1; opacity: 0.1;
                    background-image: linear-gradient(#444 1px, transparent 1px), linear-gradient(90deg, #444 1px, transparent 1px);
                    background-size: 50px 50px; }
    </style>
</head>
<body>
    <div class="hud-grid"></div>
    <div id="three-container" data-dev-mode="true"></div>
</body>
</html>
