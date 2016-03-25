CDIR=`pwd`

# deploy files to release repo
# (change this path to point to your (local) release repository)
cd ../my-application

#rm -rf config module public shell sql

cp -rp ../application-base/build/* ./
cp -p ../application-base/build/.gitignore ./
cp -p ../application-base/build/.gitlab-ci.yml ./
cp -p ../application-base/build/.scrutinizer.yml ./

git add .
git commit -m "new release build"
git pull
git push --set-upstream origin master

cd $CDIR

