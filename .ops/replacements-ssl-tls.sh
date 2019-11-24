###
# project/pipeleine variable replacements
#
# @uses $ENVIRONMENT, $BUILD_LABEL
# uses $PROJECTSLUG, $PROJECTNAMESPACE, $PROJECTHOSTNAME
# uses $CI_PROJECT_DIR, $CI_COMMIT_REF_NAME
###

sed -i s/ENVIRONMENT/${ENVIRONMENT}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/ssl-tls-issuer.yaml
sed -i s/PROJECTSLUG/${PROJECTSLUG}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/ssl-tls-issuer.yaml
sed -i s/PROJECTNAMESPACE/${PROJECTNAMESPACE}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/ssl-tls-issuer.yaml
sed -i s/PROJECTHOSTNAME/${PROJECTHOSTNAME}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/ssl-tls-issuer.yaml

sed -i s/ENVIRONMENT/${ENVIRONMENT}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/ssl-tls-certificate.yaml
sed -i s/PROJECTSLUG/${PROJECTSLUG}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/ssl-tls-certificate.yaml
sed -i s/PROJECTNAMESPACE/${PROJECTNAMESPACE}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/ssl-tls-certificate.yaml
sed -i s/PROJECTHOSTNAME/${PROJECTHOSTNAME}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/ssl-tls-certificate.yaml

sed -i s/ENVIRONMENT/${ENVIRONMENT}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/ingress-ssl-tls.yaml
sed -i s/PROJECTSLUG/${PROJECTSLUG}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/ingress-ssl-tls.yaml
sed -i s/PROJECTNAMESPACE/${PROJECTNAMESPACE}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/ingress-ssl-tls.yaml
sed -i s/PROJECTHOSTNAME/${PROJECTHOSTNAME}/g ${CI_PROJECT_DIR}/.ops/config/kubernetes/ingress-ssl-tls.yaml
