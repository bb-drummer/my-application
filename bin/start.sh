
PROJECT_DIR=/workspace/my-application/

cp ${PROJECT_DIR}.ops/config/env.txt ${PROJECT_DIR}.env

composer install --ignore-platform-reqs

docker login -u "$DOCKER_USERNAME" -p "$DOCKER_TOKEN"
COMPOSE_FILE="${PROJECT_DIR}.gitpod.compose.yml"

docker-compose -f ${COMPOSE_FILE} pull
docker-compose -f ${COMPOSE_FILE} up -d

