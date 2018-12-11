# Biblioteca-GBH-Online

1) Cargar la base de dato MYSQL "gbh.sql".
2) Editar el archivo APP\Config\Database.php con las credenciales de su MySQL:

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'gbh',
    'username' => 'root',
    'password' => 'unicode98123',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);
