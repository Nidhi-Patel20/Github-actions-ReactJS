#!/bin/sh -l

if [ true ]
then
    echo 'error'
    exit 1
fi 


echo "::debug ::This is debug message"
echo "::warning ::This is warning message"
echo "::error ::This is error message"

echo "::add-mask::$1"
echo "Hello $1"
time=$(date)
echo "::set-output name=time::$time"

echo "::group::some expandable logs"
echo 'random stuff'
echo 'again random stuff...'
echo '::endgroup::'

echo "HELLO=hello" >> $GITHUB_ENV
