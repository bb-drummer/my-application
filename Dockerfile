FROM harbor.bjoernbartels.earth:8013/my-application/my-application-runtime-php:latest

LABEL maintainer="Björn Bartels <coding@bjoernbartels.earth>" \
      Description="[my-application] build environment]"

ARG ARTIFACT_DIR

# Re-configure nginx & PHP
ADD ${ARTIFACT_DIR}/. /var/www/

# Set project root as current working directory
WORKDIR /var/www
