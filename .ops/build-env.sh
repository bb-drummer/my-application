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

export ENVIRONMENT=dev;
export HOST_NAME=${HOST_DEV};
export PROJECTHOSTNAME=${CI_COMMIT_REF_SLUG}-${HOST_NAME};
export PROJECTSLUG=${PROJECTSLUG}-${CI_COMMIT_REF_SLUG};

if [ "$CI_COMMIT_REF_SLUG" = "master" ]; then
  export ENVIRONMENT=staging;
  export HOST_NAME=${HOST_STAGING};
  export PROJECTHOSTNAME=${HOST_NAME};
fi;
if [ "$CI_COMMIT_REF_SLUG" = "release" ]; then
  export ENVIRONMENT=production;
  export HOST_NAME=${HOST_PROD};
  export PROJECTHOSTNAME=${HOST_NAME};
fi;
if [ ! -z "$CI_COMMIT_TAG" ]; then
  export ENVIRONMENT=production;
  export HOST_NAME=${HOST_PROD};
  export PROJECTHOSTNAME=${HOST_NAME};
fi;
