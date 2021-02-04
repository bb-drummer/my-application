###
# sym-link resources to project dir
#
# @uses $CI_PROJECT_DIR
###

ln -s /build-env/env.txt ${CI_PROJECT_DIR}/env.txt
ln -s /build-env/node_modules ${CI_PROJECT_DIR}/node_modules
ln -s /build-env/package-lock.json ${CI_PROJECT_DIR}/package-lock.json
