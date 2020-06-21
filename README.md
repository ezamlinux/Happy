# Happy

Happy Package for Api creation

## Command
`php artisan happy:init`

create user and oauth token

`php artisan happy:key`

create ouath token for user

`php artisan happy:model`

Act like this command : `php artisan make:model Robot --api --factory --migration` but store inside an Http\Api directory

`php artisan happy:route`

generate route in json file ( for JS purpose, see publishable/route.js, would be really publishable soon)

## Trait 

Trait for automating test in api context (CRUD operation with excepted response) use Factory so make it good

see Console/Commands/stubs/test for example file (would be automated soon)

## Todo
Better configuration and advanced fonctionnality
