<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# peppero-locks

https://handbook.interaction-design.org/development/library/back-end/conventions--php.html#final-by-default
https://www.php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration

User::where('id', 2)->get()
Zone::find(1)->doors
Door::first()->zone->users

Has many through:

```PHP
User::find(2)->zones->first()->doors
Zone::find(1)->doors
User::find(2)->doors


User::find(1)->hasAccessToDoor(Door::find(616))
User::find(1)->hasAccessToDoor(Door::find(711))

User::firstWhere('admin_flag', false)->zoneDoors

User::find(2)->doors




```

```MySQL
SELECT
     a.user_id
    ,d.zone_id
    ,d.id AS door_id
    ,d.name
FROM doors d
INNER JOIN user_access a
    ON d.zone_id = a.zone_id
WHERE a.user_id = 2
ORDER BY zone_id, door_id;
```




## TODO: 


- Refactor foreign key constraints
- Add zonal admin only
- Add additional logic, eg. expire
- Add query() to queries
- Finished readme

