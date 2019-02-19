<?php header('Location: /wp/wp-admin/' . trim(parse_url($url, PHP_URL_PATH), '/') . "?" . http_build_query($_GET));
