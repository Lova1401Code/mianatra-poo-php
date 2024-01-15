<?php
    function renderPage(String $path, $variable = [])
    {
        extract($variable);
        ob_start();
        require('templates/'.$path.'.html.php');
        $pageContent = ob_get_clean();
        require('templates/layout.html.php');

    }
    function redirection(String $url): void
    {
        header("Location: $url");
        exit();
    }
 ?>