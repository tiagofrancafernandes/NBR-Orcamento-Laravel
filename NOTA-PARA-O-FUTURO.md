## TODO


## Reports

* [2023-07-12]
> Removi o relacionamento `nbrGroup` que era do tipo `hasManyThough`. Optei por mudar para [morphToMany/many to many](https://laravel.com/docs/10.x/eloquent-relationships#many-to-many-polymorphic-relations).
> Devido às regras de funcionamento do filament.
> O que falta fazer:
> 1. Criar a tabela que fará o relacionamento
> 2. Criar o relacionamento
> 3. Criar o `RelationManager` do filament para isso

* [2023-07-19] - NÃO foi finalizada o relacionamento confirme dito antes, porém foi dito que seria criado no intervalo entre essa aula e a próxima.
> O que precisa ser feito:
> - Relacionamento entre `composição` e `insumos`
>    - Trazer uma lista de insumos de uma composição
> - Relacionamento entre `composição` e `composição filha`
>    - Trazer uma lista de composições filhas de uma composição

* [2023-07-21] - Criado resources para User a Role.
>
> Usar itens abaixo para criar relacionamento entre NBR e SINAPI
> ```
> app/Filament/Resources/RoleResource.php
> app/Filament/Resources/RoleResource/RelationManagers/UsersRelationManager.php
> app/Filament/Resources/UserResource.php
> app/Filament/Resources/UserResource/RelationManagers/RolesRelationManager.php
> app/Models/Role.php
> app/Models/RoleUser.php
> app/Models/User.php
> database/migrations/2023_07_21_080921_create_roles_table.php
> database/migrations/2023_07_21_080947_create_role_users_table.php
> ```
> ...
