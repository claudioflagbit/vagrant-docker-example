# Installation

Already Docker and Vagrant installed?

```
cd /this/projects/path/
vagrant up --provider=docker --no-parallel
```

Call http://dockerdocker.dev in your browser. That's all.

Destroy it with

```
vagrant destroy -f
```

## Useful Docker commands

Execute commands directly on a running Docker container:

docker exec -it {container_name} {command}

Working directly in a container:

docker exec -it {container_name} /bin/bash

## Known issues

### mysql-container doesn't start on first vagrant up

Most of the time it starts on the second try. This example project works with the official MySQL Docker-Image, so an alternative would be creating a custom Image.

