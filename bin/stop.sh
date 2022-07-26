
PROJECT_DIR=/workspace/my-application/
COMPOSE_FILE="${PROJECT_DIR}.gitpod.compose.yml"

docker-compose -f ${COMPOSE_FILE} down -v

