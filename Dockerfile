FROM bbdrummer/my-application-runtime-php:development

LABEL maintainer="Björn Bartels <coding@bjoernbartels.earth>" \
      Description="[my-application] build environment]"

ARG ARTIFACT_DIR
ARG REDIS_DSN

# updates
USER root
RUN apk update && apk upgrade

# redis
RUN if [[ ! -z "${REDIS_DSN}" ]]; then \
      echo "session.save_path=\"${REDIS_DSN}\"" > /usr/local/etc/php/conf.d/redis.ini; \
    fi

RUN chmod -R +rw /var/www/html && rm -rf /var/www/html
COPY --chown=nobody ${ARTIFACT_DIR}/ /var/www/

USER nobody
