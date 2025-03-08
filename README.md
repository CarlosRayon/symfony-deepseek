# Proyecto Symfony DeepSeek

Este es un proyecto basado en Symfony para conectarse con DeepSeek.
Se necesita una cuenta en DeepSeek y generar una API key en [https://platform.deepseek.com/sign_in](https://platform.deepseek.com/sign_in)
Tenemos que tener algún "TOP UP" para pagado

## Requisitos

- PHP 8.2 o superior
- Composer
- Symfony CLI

## Instalación

1. Clona el repositorio:

    ```sh
    git clone https://github.com/CarlosRayon/symfony-deepseek
    cd symfony-deepseek
    ```

2. Instala las dependencias usando Composer:

    ```sh
    composer install
    ```

3. Configura las variables de entorno:

    Crea un fichero `.env.local`. Luego, ajusta las variables de entorno de la API de DeepSeek 

    ```sh
    DEEP_SEEK_API_URL=
    DEEP_SEEK_API_KEY=
    ```


## Uso

1. Inicia el servidor de desarrollo:

    ```sh
    symfony server:start
    ```
2. Accede a la aplicación en tu navegador:

    ```
    http://localhost:8000
    ```

## Ejecutar Pruebas

Para ejecutar las pruebas, usa el siguiente comando:

```sh
php bin/phpunit
