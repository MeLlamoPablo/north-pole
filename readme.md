# northpole

Northpole es un sistema de gestión y archivado de ficheros que permite almacenar
datos de forma segura, simple, y barata.

# Instalación

Para instalar este proyecto:

```shell
# Clonar el repositorio:
$ git clone git@github.com:MeLlamoPablo/north-pole.git

# Montar la máquina virtual
$ cd north-pole
$ composer install
$ vagrant up

# Preparar la base de datos
$ vagrant ssh
$ cd code
$ php artisan migrate
$ php artisan db:seed
```

Tras ello podremos acceder a `northpole` yendo a `northpole.test` o a
`localhost:3000`