<h1 align="center" >
    <a href="https://github.com/micahdougall/peppero-locks" style="color:darkgoldenrod; font-family: verdana;">
        Peppero Locks
    </a>
</h1>
<p align="center">
    <a href="https://github.com/micahdougall/peppero-locks" target="_blank">
        <img src="padlock" width="100" alt="Peppero Locks Logo">
    </a>
</p>

<p align="center">
<a href="https://github.com/micahdougall/peppero-locks"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>

[//]: # (<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>)
[//]: # (<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>)
[//]: # (<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>)
</p>

<!-- TOC -->
* [Main title](#main-title)
    * [Subtitle](#subtitle)
    * [Another subtitle](#another-subtitle)
* [Another main title](#another-main-title)
    * [Secondary subtitle](#secondary-subtitle)
        * [Third level header](#third-level-header)
<!-- TOC -->


# peppero-locks

https://github.com/micahdougall/peppero-locks

https://handbook.interaction-design.org/development/library/back-end/conventions--php.html#final-by-default
https://www.php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration



```mermaid
erDiagram
CUSTOMER ||--o{ ORDER : places
CUSTOMER {
string name
string custNumber
string sector
}
ORDER ||--|{ LINE-ITEM : contains
ORDER {
int orderNumber
string deliveryAddress
}
LINE-ITEM {
string productCode
int quantity
float pricePerUnit
}
```

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
- Finished readme

