<?php

require __DIR__ . '/../model/articleRepository.php';

$articles = getArticles();

require __DIR__ . '/../view/membres/public/articles.php';

$articleContent = getArticleContent();

$articleImg = getArticleImage();