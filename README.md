# Installation

Be sure that the ports 80 and 443 are not blocked by another application before you start this example.

Have you already Docker and Vagrant installed?

```
cd /this/projects/path/
vagrant up --provider=docker --no-parallel
```

Call http://localhost in your browser. That's all.

Stop the containers with

```
vagrant halt
```

Destroy it with

```
vagrant destroy -f
```

## Useful Docker commands

Execute commands directly on a running Docker container:

docker exec -it {container_name} {command}

Working directly in a container:

docker exec -it {container_name} /bin/bash
