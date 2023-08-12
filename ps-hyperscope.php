<?php

$DISCLAIMER = "<p>This page has been modified by a program for demonstration purposes.</p>";

function inject_disclaimer($html_content) {
    $modified_html = preg_replace('/<body>/', '<body>' . $GLOBALS['DISCLAIMER'], $html_content, 1);
    return $modified_html;
}

function inject_script($html_content) {
    $script_tag = '<script src="YOUR_JS_FILE_URL"></script>';  // Replace with your JavaScript file URL
    $modified_html = preg_replace('/<\/head>/', $script_tag . '</head>', $html_content, 1);
    return $modified_html;
}

if (isset($_GET['url'])) {
    $target_url = $_GET['url'];
    $response = file_get_contents($target_url);

    if ($response !== false) {
        $modified_content = inject_disclaimer($response);
        $modified_content = inject_script($modified_content);
        echo $modified_content;
    } else {
        echo "Failed to fetch content from $target_url.";
    }
} else {
    echo "No target URL provided.";
}

?>
