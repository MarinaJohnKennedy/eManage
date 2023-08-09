<?php 

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/employees', 'controllers/employees/index.php');
$router->get('/employees/show', 'controllers/employees/show.php');
$router->patch('/employees/show', 'controllers/employees/show.php');


$router->delete('/employees', 'controllers/employees/destroy.php');

$router->get('/employees/edit', 'controllers/employees/edit.php');

$router->patch('/employees', 'controllers/employees/update.php');


$router->get('/employees/create', 'controllers/employees/create.php');
$router->post('/employees', 'controllers/employees/store.php');

$router->get('/employees/import', 'controllers/employees/import.php');
$router->get('/employees/export', 'controllers/employees/export.php');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php');

$router->get('/account', 'controllers/account/show.php');

$router->get('/account/edit', 'controllers/account/edit.php');
$router->patch('/account', 'controllers/account/update.php');

$router->get('/login', 'controllers/sessions/create.php')->only('guest');
$router->post('/login', 'controllers/sessions/store.php')->only('guest');
$router->delete('/logout', 'controllers/sessions/destroy.php')->only('auth');


$router->get('/changepassword', 'controllers/changepassword/edit.php');
$router->patch('/changepassword', 'controllers/changepassword/update.php');

$router->get('/admin/account', 'controllers/admin/account/show.php');

$router->get('/admin/account/edit', 'controllers/admin/account/edit.php');
$router->patch('/admin/account', 'controllers/admin/account/update.php');

$router->get('/admin/changepassword', 'controllers/admin/changepassword/edit.php');
$router->patch('/admin/changepassword', 'controllers/admin/changepassword/update.php');