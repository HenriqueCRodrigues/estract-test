<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"><img src="https://res.cloudinary.com/programathor/image/upload/c_fit,h_200,w_200/v1568233627/pbb4mhru22utiq7qsizf.png" width="150"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


## Desafio eStracta Tecnologia
Foi realizado a criação da API de consulta no site http://www.guiatrabalhista.com.br/guia/salario_minimo.htm <br>
Para emular o projeto, basta seguir os requisitos básico do Laravel 7.x, que se encontra no link: https://laravel.com/docs/7.x

Após isso, utilizar o comando "php artisan serve"

```
+--------+----------+--------------------+------+-------------------------------------+--------------+
| Method   | URI                | Action                                              | Middleware   |
+--------+----------+--------------------+------+-------------------------------------+--------------+
| GET|HEAD | /                  | Closure                                             | web          |
| GET|HEAD | api/get-salary     | App\Http\Controllers\CrawlerController@getSalary    | api          |
| GET|HEAD | api/get-salary-xls | App\Http\Controllers\CrawlerController@getSalaryXLS | api          |
+--------+----------+--------------------+------+-------------------------------------+--------------+
```
#### api/get-salary 
```
Rota do tipo GET, que retorna as informações do crawler formatada
Exemplo do Response abaixo
```
<img src="https://i.imgur.com/5oospfB.png">
<br>

#### api/get-salary-xls
```
Um bônus, rota do tipo GET, que fornece os dados da API em uma planilha excel
Exemplo da planilha abaixo
```
<img src="https://i.imgur.com/BCWZmbH.png">
<br><br>

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
