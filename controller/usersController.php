<?php

require __DIR__ . '/../model/usersRepository.php';

$users = getUsers();

require __DIR__ . '/../view/membres/public/NameUsers.php';
