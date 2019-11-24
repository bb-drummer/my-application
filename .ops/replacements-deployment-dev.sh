###
# project/pipeleine variable replacements
#
# @uses $ENVIRONMENT, $BUILD_LABEL
# uses $PROJECTSLUG, $PROJECTNAMESPACE, $PROJECTHOSTNAME
# uses $CI_PROJECT_DIR, $CI_COMMIT_REF_NAME
###

sed -i s/ENVIRONMENT/${ENVIRONMENT}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/deployment-dev.yaml
sed -i s/PROJECTSLUG/${PROJECTSLUG}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/deployment-dev.yaml
sed -i s/PROJECTNAMESPACE/${PROJECTNAMESPACE}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/deployment-dev.yaml
sed -i s/PROJECTHOSTNAME/${PROJECTHOSTNAME}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/deployment-dev.yaml
sed -i s/DOCKER_TAG/${CI_COMMIT_REF_NAME}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/deployment-dev.yaml
sed -i s/BUILD_LABEL/${BUILD_LABEL}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/deployment-dev.yaml
sed -i s/HOSTNAME_SUFFIX/${CI_COMMIT_REF_NAME}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/deployment-dev.yaml
