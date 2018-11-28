# USC Test application

This is "Graph editor" application. It works as rest api app with single endpoint
"/shapes".

It accepts post request in json format like:

```json
{
  "shapes": [
    {"type":  "circle", "params":  {"radius":  15}},
    {"type":  "square", "params":  {"size":  20}}
  ]
}
```

**App can run on PHP version 5.5+**

## Getting started

App can be run with Docker or without it.

With docker just build image:

`docker build -t usc .`

And than start it. Don't forget to expose port:

`docker run -p 28000:8000 -v [my path]:/srv/usc -ti --name usc usc`

After this command app is available on port 28000.

### Without docker

Without docker just install composer packages `composer install` 
and run `cd app/www && php -S 127.0.0.1:8000`.

In example above app will be available at link `http://127.0.0.1:8000`

Change port and IP to your desire.

## Why need composer?

Composer autoload and phpunit is used for app. It can work without it but will require
bootstrap file for php dev server.

## Running tests

With docker just exec phpunit:
`docker exec -ti usc vendor/bin/phpunit tests`

## How to test application

Just use any rest client. I tested with postman.

Run request sending content type `application/javascript` and with "Accept" header
`application/javascript`.

Application has single working endpoint - `/shapes`

It responses to `POST` requestst only.

Request format is:

```json
{
  "shapes": [
    {"type":  "circle", "params":  {"radius":  15}},
    {"type":  "square", "params":  {"size":  20}}
  ]
}
```

Now only cirle and square types are supported.

Circle accepts paramters:

* radius
* color

Square accepts parameters:

* size
* color

For provided parameters app will respond with text message that describes shape.

## How to extend application

With provided body best way to extend shapes is to add shapes into `app/lib/shapes`.

All shapes should implement interface `Shape` (`app/lib/shapes/interfaces/Shape.php`).

And than add them to mapping in `ShapeController`. Method `shapesMap`.

That's basically it.
