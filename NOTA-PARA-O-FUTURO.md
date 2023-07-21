## TODO


## Reports

- [2023-07-12]
> Removi o relacionamento `nbrGroup` que era do tipo `hasManyThough`. Optei por mudar para [morphToMany/many to many](https://laravel.com/docs/10.x/eloquent-relationships#many-to-many-polymorphic-relations).
> Devido às regras de funcionamento do filament.
> O que falta fazer:
> 1. Criar a tabela que fará o relacionamento
> 2. Criar o relacionamento
> 3. Criar o `RelationManager` do filament para isso

- [2023-07-19] - NÃO foi finalizada o relacionamento confirme dito antes, porém foi dito que seria criado no intervalo entre essa aula e a próxima.
> O que precisa ser feito:
> - Relacionamento entre `composição` e `insumos`
>    - Trazer uma lista de insumos de uma composição
> - Relacionamento entre `composição` e `composição filha`
>    - Trazer uma lista de composições filhas de uma composição
