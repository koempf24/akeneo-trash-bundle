# Installation

1) Composer install
```shell
composer require koempf/akeneo-trash-bundle
```

2) Add bundle to config/bundles.php
```php
<?php

return [
    \Koempf\TrashBundle\KoempfTrashBundle::class => ['dev' => true, 'test' => true, 'prod' => true],
];
```

3) Database migration
```shell
php bin/console doctrine:migration:diff --env=prod
php bin/console doctrine:migrations:migrate --env=prod
```
