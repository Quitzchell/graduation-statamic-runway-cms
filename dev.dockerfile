ARG IMAGE=alpine:3.19
FROM ${IMAGE}

USER root
RUN apk update && \
    apk add --no-cache \
        php83-sqlite3 \
        php83-pdo_sqlite \
        php83-intl \
        && rm -rf /var/cache/apk/*
USER docker
