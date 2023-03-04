
PROJECT_DIR=${PROJECT_DIR:-/workspace/my-application/}

if [[ ! -f ${PROJECT_DIR}.env ]]; then
  cp ${PROJECT_DIR}.ops/config/env.txt ${PROJECT_DIR}.env
  cp ${PROJECT_DIR}config/autoload/app.local.dist.php ${PROJECT_DIR}config/autoload/app.local.php
fi

docker login -u "$DOCKER_USERNAME" -p "$DOCKER_TOKEN"
COMPOSE_FILE="${PROJECT_DIR}.gitpod.compose.yml"

docker-compose -f ${COMPOSE_FILE} pull
docker-compose -f ${COMPOSE_FILE} up -d

