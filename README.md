# PHP P.O.O.

## Prerequisites

*One or the other*

- [ ] [MAMP](https://www.mamp.info/en/downloads/) (MacOS), [WAMP](https://www.wampserver.com/en/download-wampserver-64bits/) (Windows) or LAMP
- [ ] [docker](https://docs.docker.com/get-docker/)

> ⚠️ For those working on Linux you'll need to install [docker-compose](https://docs.docker.com/compose/install/#install-compose-on-linux-systems) manually, on MacOS or Windows it's included with the desktop app.

## Installation

Clone the project

```shell
# if your using ssh
git clone git@gitlab.com:itakademy1/p1_a2/procedural-to-oop-mvc.git destination
# with https
git clone https://gitlab.com/itakademy1/p1_a2/procedural-to-oop-mvc.git destination
```

## Initialization

### With MAMP, WAMP or LAMP

Make sure to clone the project inside your `www/` directory or in your document root directory
(`/Users/your-name/Sites/localhost` for MAMP)

### With docker-compose

Just run in your terminal

```shell
docker-compose up
```

You can now access the application on **http://localhost**

### First run

In the first run of the project, you may have to setup the database

To do so, you'll have to connect to the postgres container

```sh
docker-compose exec postgres psql -U postgres 
```

Then when you're in something that's looks like `postgres=#` you should be able to run queries.

First create a `recipes` table

```sql
create table if not exists recipes
(
    id serial not null,
    title varchar(255),
    content text,
    creation_date timestamp default now(),
    constraint pk_recipes primary key (id)
);
```

And add data as you wish ! (I suggest a lorem ipsum for the content column see: https://fr.lipsum.com/)
