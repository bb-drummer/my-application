###
# sym-link resources to project dir
#
# @uses $CI_PROJECT_DIR
###

#ln -s /build-env/env.txt ${CI_PROJECT_DIR}/env.txt
#ln -s /build-env/node_modules ${CI_PROJECT_DIR}/node_modules
#ln -s /build-env/bower_components ${CI_PROJECT_DIR}/bower_components
#ln -s /build-env/yarn.lock ${CI_PROJECT_DIR}/yarn.lock
#ln -s /build-env/package-lock.json ${CI_PROJECT_DIR}/package-lock.json

declare -x ENVIRONMENT=dev;
declare -x HOST_NAME=${HOST_DEV};
declare -x PROJECTHOSTNAME=${CI_COMMIT_REF_SLUG}-${HOST_NAME}
declare -x PROJECTSLUG=${PROJECTSLUG}-${CI_COMMIT_REF_SLUG}

if [ "$CI_COMMIT_REF_SLUG" = "master" ]; then
  declare -x ENVIRONMENT=staging;
  declare -x HOST_NAME=${HOST_STAGING};
  declare -x PROJECTHOSTNAME=${HOST_NAME}
fi;
if [ "$CI_COMMIT_REF_SLUG" = "release" ]; then
  declare -x ENVIRONMENT=production;
  declare -x HOST_NAME=${HOST_PROD};
  declare -x PROJECTHOSTNAME=${HOST_NAME}
fi;
if [ ! -z "$CI_COMMIT_TAG" ]; then
  declare -x ENVIRONMENT=production;
  declare -x HOST_NAME=${HOST_PROD};
  declare -x PROJECTHOSTNAME=${HOST_NAME}
fi;
