# FFTCGDB - the Final Fantasy Trading Card Game Database
This is the repo for code on [fftcgdb.com](fftcgdb.com) - it uses [Laravel](https://laravel.com/) as a base.
#### Prerequisites & Additional Reading
- Docker engine: https://www.docker.com/get-docker
- Laravel CMS: https://laravel.com/
  - Artisan, Laravel's CLI-based debugging toolkit: https://laravel.com/docs/5.3/artisan
  - Blade, Laravel's View templating engine: https://laravel.com/docs/5.3/blade
  - Eloquent, Laravel's SQL query generator framework: https://laravel.com/docs/5.3/eloquent
-----
### Building the Development Docker Image
For development purposes, FFTCGDB can be deployed into a Docker container. The final container image is built on top of a LAMP base layer designed to support Laravel 5.

This base layer has been moved to its on repository and will automatically be pulled from hub.docker.com at build time. For more information on the base layer, visit [the Docker Hub Page](https://hub.docker.com/r/ikaruwa/lamp_base/)

#### Building the Laravel Application Layer
The FFTCGDB application code is designed to run on the Laravel 5.3 CMS framework. To create a functional instance of the code for testing during development, perform the following steps:

 1. *OPTIONAL:* Run the `bin/update_cards.sh clean` shellscript (will work on any *nix-based OS) to ensure your development instance's Card table is in sync with production
 2. Go sign up for a [rECAPTCHA v2](https://www.google.com/recaptcha/admin#list) API key and secret. Note that if you are accessing this container using `localhost` or `127.0.0.1` the reCAPTCHA applet will not require a unique API key and secret, so you can skip this step.
    1. Open the .env.example file in a text editor and set your API key and secret in the designated NOCAPTCHA environment variable lines. Your entries should look like:

       >`NOCAPTCHA_SITEKEY=abcdefghijklmnopqrstuvwxyz`
       >`NOCAPTCHA_SECRET=1234567890`

 3. Build the Application layer Docker image with the following command:

    >`docker build -t fftcg:latest .`

At this point, you can start the Application layer image using your Docker host:

> `docker run --rm -d --privileged -p 80:80 --name fftcg --hostname fftcg fftcg:latest`

These arguments will start the container in a Daemonized fashion, give it necessary permissions to access the host system's TCP stack for network access, and forward all http requests made against the Host server's IP address to the container for response.

You can access the container by navigating to [http://localhost](http://localhost), unless you are running the container on a remote computer in which case you would want to use that computer's IP address.

You can modify the contents of the container by running `docker exec -ti fftcg bash` to start an interactive shell session inside the container. The contents of the FFTCGDB repository will be located in `/var/www/`
