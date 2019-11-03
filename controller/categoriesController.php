<?php

require __DIR__ . '/../model/categoriesRepository.php';

$categories = getCategories();

require __DIR__ . '/../view/membres/public/categories.php';
