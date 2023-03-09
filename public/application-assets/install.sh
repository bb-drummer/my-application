# Clones the foundation-docs repo and links it to NPM locally
git clone https://github.com/zurb/foundation-docs
cd foundation-docs
yarn link
cd ..

# install foundation dependencies
yarn

# link foundation-docs repo to project
yarn link foundation-docs
