<?php

require __DIR__ . '/../model/commentsRepository.php';

$comments = getComments();

require __DIR__ . '/../view/membres/public/comments.php';
