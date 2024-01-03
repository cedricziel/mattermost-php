#!/usr/bin/env bash

docker run --rm -v "${PWD}:/local" openapitools/openapi-generator-cli config-help \
    -g php

docker run --rm -v "${PWD}:/local" openapitools/openapi-generator-cli generate \
    -i /local/resources/openapi.json \
    -g php \
    -o /local/out/php \
    --additional-properties=variableNamingConvention=camelCase \
    --additional-properties=srcBasePath=src/gen \
    --additional-properties=invokerPackage=CedricZiel\\Mattermost \
    --additional-properties=modelPackage=Model \
    --additional-properties=library=psr-18 \
    --skip-validate-spec
