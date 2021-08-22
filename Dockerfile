FROM bbdrummer/my-application-runtime-php:8-0

LABEL maintainer="Björn Bartels <coding@bjoernbartels.earth>" \
      Description="[my-application] build environment]"

ARG ARTIFACT_DIR

# updates
USER root
RUN apk update && apk upgrade
USER nobody

# Re-configure nginx & PHP
COPY --chown=nobody ${ARTIFACT_DIR}/ /var/www/

# Set project root as current working directory
WORKDIR /var/www
