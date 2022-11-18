# Welcome to Docker Project Basics


Requirement
-----------

You should export the following environment variables
for build the php docker image and sets the uid and gui of apache user.

```bash
export DOCKER_WWW_DATA_GID=$(id -g)
export DOCKER_WWW_DATA_UID=$(id -u)
```

You could copy/paste into `~/.bashrc` or `~/.zshrc`

Git Submodules
--------------

### Project first creation

When you create a new project, import the submodule with the following command :

```bash
git submodule add git@gitlab.com:amphibee/project-basics/docker.git .docker
```

Copy the Makefile.traefik.dist file in your project root directory and give it write permissions:

```bash
cp .docker/Makefile.traefik.dist Makefile && chmod +x Makefile
```

### Project installation

After cloning the project, in order to import the docker project basics, init submodules like this:

```bash
git submodule sync --recursive
git submodule update --init --recursive
```

Copy the Makefile.traefik.dist file in your project root directory and give it write permissions:

```bash
mv .docker/Makefile.traefik.dist Makefile && chmod +x Makefile
```

### Configuration

- **`PHP_VERSION` (required)** : The wanted PHP version (default : 8.0)
- **`APP_TD` (required)** : The project name (will generate the url https://{APP_TD}.docker.localhost)
- **`APP_PUBLIC_DIR` (optional)** : The project public directory (default : /app/htdocs)

### Media proxy

If you want to use remote media, it's possible with the proxy settings. Just configure two environment variables :

- **`APP_REMOTE_MEDIA_ROOT_URI` (required)** : The full domain (with https://) of the remote website you want to use to use medias.
- **`APP_MEDIAS_DIR` (optional)** : The media directory path (default : /app/htdocs/content/uploads)

Commands
------

You can view the command list with the following command:

```bash
make help
```

or simply:

```bash
make
```

Hosts
-----

You can view the full host list after the `make up` command.