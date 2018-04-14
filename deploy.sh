#!/bin/sh

if [ -e composer.json ]
then
    $1 `which composer` update
fi

BASEDIR=$(dirname "$0")/../../..

$1 $BASEDIR/bin/console sw:plugin:refresh
$1 $BASEDIR/bin/console sw:plugin:install "${PWD##*/}" --activate
$1 $BASEDIR/bin/console sw:plugin:update "${PWD##*/}"
$1 $BASEDIR/bin/console sw:snippets:to:db --include-plugins
$1 $BASEDIR/bin/console sw:theme:synchronize
$1 $BASEDIR/bin/console sw:theme:cache:generate
$1 $BASEDIR/bin/console sw:cache:clear
