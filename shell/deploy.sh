#!/bin/bash
##
## deploy current build files to release repo
##
## @param string release-repo-target-path (ex: ../my-application)
##
CDIR=`pwd`;
BUILD_SRC='build';
TARGET=$1;

echo 'deploying build files to release repository...';
echo 'target: ' $TARGET;
echo 'source: ' $CDIR'/'$BUILD_SRC'/';


#
# syncronize files from build directory and release repo directory
#
cd $TARGET
echo 'syncronizing files from build directory...';

# 'copy' version: this might cause analysers to detect 'false positive' changes 
# for files with unchanged content, because their dates have changed (!) ( 'hello' scrutinizer :D )
#
#rm -rf config module public shell sql
#cp -rp ../application-base/build/* ./
#cp -p ../application-base/build/.gitlab-ci.yml ./
#cp -p ../application-base/build/.scrutinizer.yml ./

# 'rsync' version, exclude .git* files to keep repo info *g* O:)
#
rsync -v -a --inplace --delete --exclude='.git*' --exclude='.vagrant*' --exclude='.report*' $CDIR/$BUILD_SRC/ ./


#
# commit changes to repo...
#

echo 'detect/compare changes to current branch/revision...';
git status
git diff

echo 'commiting files to release repository...';
git add .
git commit -m "new release build"
git pull
git push --set-upstream origin master


# going back to where we came from...
cd $CDIR

exit
