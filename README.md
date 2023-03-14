## laravel-jwt-restful
1. Adicionar bibliotecas
    > composer update
2. Gerar migrations
    > php artisan migrate
3. Rodar seeder para gerar o usuário admin
     - Os dados de acesso encontra-se em: database/seeders/UserSeeder.php
    > php artisan db:seed
4. Rodar o servidor local
    >php artisan serve
