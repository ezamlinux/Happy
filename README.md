# Happy

Happy Package for Api creation

## Installation

`composer require ezamlinux/happy`

add the following in your config/app.php

```php
'providers' => [
    // Others Providers
    Happy\Providers\ServiceProvider::class,
]
```
## Command
`php artisan happy:init`

create user and oauth token

`php artisan happy:key`

create ouath token for user

`php artisan happy:model`

Act like this command : `php artisan make:model Robot --api --factory --migration` but store inside an Http\Api directory

`php artisan happy:route`

generate route in json file ( for JS purpose, see publishable/route.js)

## Trait 

Trait for automating test in api context (CRUD operation with excepted response) based on Route::apiResource() method

see Console/Commands/stubs/test for example file (would be automated soon)`

use Factory so make it good

Exemple `php artisan test` :
```php
routes/api.php
Route::apiResource('human', 'HumanController');

//
PASS Tests\Api\HumanTest
✓ index // 200 Ok
✓ store // 201 Created
✓ show // 200 Ok
✓ update // 200 Ok
✓ update unknow // 404 Not Found
✓ delete // 204 No content
✓ delete twice // 404 Not Found
```
## Publish
config file

route.js : JavaScript route() helper

## Todo
Better configuration and advanced fonctionnality
Better database clean after test
