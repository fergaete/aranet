#!/bin/bash
find . -type f -name '._*' | xargs rm -rf
find . -type f -name '.DS*' | xargs rm -rf
for f in `find . -type f -name "*.php"`
do
svn propset svn:keywords "Id Rev Date" $f
done

