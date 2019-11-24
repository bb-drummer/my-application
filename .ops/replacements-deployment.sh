###
# project/pipeleine variable replacements
#
# @uses $ENVIRONMENT, $BUILD_LABEL
# uses $PROJECTSLUG, $PROJECTNAMESPACE, $PROJECTHOSTNAME
# uses $CI_PROJECT_DIR, $CI_COMMIT_REF_NAME
###

if [[ -z "${1}" ]]; then
    echo "you must provide a target file as first argument...";
    exit 1;
fi;

sed -i s/ENVIRONMENT/${ENVIRONMENT}/g ${CI_PROJECT_DIR}/${1}
sed -i s/PROJECTSLUG/${PROJECTSLUG}/g ${CI_PROJECT_DIR}/${1}
sed -i s/PROJECTNAMESPACE/${PROJECTNAMESPACE}/g ${CI_PROJECT_DIR}/${1}
sed -i s/PROJECTHOSTNAME/${PROJECTHOSTNAME}/g ${CI_PROJECT_DIR}/${1}
sed -i s/DOCKER_TAG/${CI_COMMIT_REF_NAME}/g ${CI_PROJECT_DIR}/${1}
sed -i s/BUILD_LABEL/${BUILD_LABEL}/g ${CI_PROJECT_DIR}/${1}
sed -i s/HOSTNAME_SUFFIX/${CI_COMMIT_REF_NAME}/g ${CI_PROJECT_DIR}/${1}
