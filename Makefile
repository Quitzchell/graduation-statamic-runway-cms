project_name="graduation-project"

.PHONY: all
all: build up

.PHONY: build
build:
	PROJECT_NAME="$(project_name)" docker compose build

.PHONY: up
up:
	PROJECT_NAME="$(project_name)" docker compose up --no-build
