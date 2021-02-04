###
# get k8s (minikube) master-host's https/tls certificates
#
# @uses $KUBEKONFIG, $CI_PROJECT_DIR
###

mkdir -p ${CI_PROJECT_DIR}/k8s

cp ${KUBECONFIG}/.kube/config ${CI_PROJECT_DIR}/k8s/
cp ${KUBECONFIG}/.minikube/ca.crt ${CI_PROJECT_DIR}/k8s/
cp ${KUBECONFIG}/.minikube/client.crt ${CI_PROJECT_DIR}/k8s/
cp ${KUBECONFIG}/.minikube/client.key ${CI_PROJECT_DIR}/k8s/

ls -la ${CI_PROJECT_DIR}/k8s/
