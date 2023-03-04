export DOCKER_BUILDKIT=1;
export COMPOSE_DOCKER_CLI_BUILD=1;
export PATH="/home/gitpod/.config/composer/vendor/bin:$PATH"

PROJECT_DIR=${PROJECT_DIR:-/workspace/my-application/}

alias start="${PROJECT_DIR}/bin/start.sh"
alias stop="${PROJECT_DIR}/bin/stop.sh"