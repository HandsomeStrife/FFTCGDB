# FFTCGDB - the Final Fantasy Trading Card Game Database
This is the repo for code on [fftcgdb.com](fftcgdb.com) - it uses [Laravel](https://laravel.com/) as a base.
#### Prerequisites & Additional Reading
- Docker engine: https://www.docker.com/get-docker
- Laravel CMS: https://laravel.com/
  - Artisan, Laravel's CLI-based debugging toolkit: https://laravel.com/docs/5.3/artisan
  - Blade, Laravel's View templating engine: https://laravel.com/docs/5.3/blade
  - Eloquent, Laravel's SQL query generator framework: https://laravel.com/docs/5.3/eloquent

#### Building the Development Docker Image
For development purposes, FFTCGDB can be deployed into a Docker container. The final container image is built on top of a LAMP base layer designed to support Laravel 5.3.
#### Building the LAMP Base Layer
The FFTCGDB repository contains two Docker build files. The LAMP base layer is referenced by the application layer, and is built using the following Docker command:

> `docker build -t lamp_base:latest -f lamp_base.docker .`

This will create a foundational container running the following:

 - Ubuntu Linux 16.04 
 - Apache Web Server 2.4
 - MySQL Server 5.7
 - PHP 5.6

By default, the Apache access and error logs will be forwarded to `stdout`, which can then be monitored with the `docker log` command. An entrypoint command is also generated which will ensure Networking, MySQL, and Apache services are ran on startup.

Note that termination of the Apache service will result in the container being stopped by the Docker engine, however `service apache2 reload` can still be used to allow for a graceful reload of Apache configuration files.
#### Building the Laravel Application Layer
The FFTCGDB application code is designed to run on the Laravel 5.3 CMS framework. To create a functional instance of the code for testing during development, perform the following steps:

 1. First, ensure you have successfully built the lamp_base layer mentioned in the above section.
 2. *OPTIONAL:* Run the 'update_cards.sh' shellscript (will work on any *nix-based OS) to ensure your development instance's Card table is in sync with production
 3. Build the Application layer Docker image with the following command:

 >`docker build -t fftcg:latest .`

At this point, you can start the Application layer image using your Docker host:

> `docker run --rm -d --privileged -p 80:80 --name fftcg --hostname fftcg fftcg:latest`

These arguments will start the container in a Daemonized fashion, give it necessary permissions to access the host system's TCP stack for network access, forward all http requests made against the Host server's IP address to the container for response.
