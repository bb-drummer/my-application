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
export HOSTNAME=${HOST_DEV};
export PROJECTHOSTNAME=${CI_COMMIT_REF_SLUG}-${HOSTNAME}
export PROJECTSLUG=${PROJECTSLUG}-${CI_COMMIT_REF_SLUG}

if [ "$CI_COMMIT_REF_SLUG" = "master" ]; then
  export ENVIRONMENT=staging;
  export HOSTNAME=${HOST_STAGING};
  export PROJECTHOSTNAME=${HOSTNAME}
fi;
if [ "$CI_COMMIT_REF_SLUG" = "release" ]; then
  export ENVIRONMENT=production;
  export HOSTNAME=${HOST_PROD};
  export PROJECTHOSTNAME=${HOSTNAME}
fi;
if [ ! -z "$CI_COMMIT_TAG" ]; then
  export ENVIRONMENT=production;
  export HOSTNAME=${HOST_PROD};
  export PROJECTHOSTNAME=${HOSTNAME}
fi;
