# Drupal Lab (Docker)

This is a simple repo for investigating development workflows, experimenting with backend edits, and general exploration with the framework. It is designed to be quick and easy to spin up a development workflow with the power of Docker.

The master branch is intended to be a running a Drupal 8 Application, with support for a cross-platform Docker environment. The goal is to provide a means for rapid development, testing, and deployment with minimal fuss on Windows, Linux, or Mac.

## Getting Started

You must have Docker installed on your local machine, then you can simply run:

`docker-compose up`

You should wait for the SQL script to complete before the website will be accessable.

## Contributing

Pull requests should only be for the purpose of improving the Docker development environment.

Edits to any of the source files (`src`), theming, and mods should be done in their own feature branch on in a separate repo that simply uses this project as a starting point.

## Using The Boilerplate /src

The default install is Drupal 8.7, running on PHP 7.3. The following credentials will log you into the drupal admin:

**username:** `drupal` **password:** `guest`

This project is designed to allow "swappable" Drupal installs via the `src` directory. You should utilize the `db` directory for local development data backups. Backups can be restored via the following command:

`docker exec -i <db container name> sh -c 'exec mysql -uroot -proot' < ./db/<backup script>`

This default provides a good baseline install from which to rapidly try out new code ideas and deployment strategies. Avoids a lot of hassle of setting up portable development environments with external tools, has better cross platform support (especially Linux), and serves as an easy template for version-controlled projects.
