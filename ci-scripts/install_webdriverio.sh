#!/usr/bin/env bash

google-chrome --version

# Load helper functionality.
source ci-scripts/helper_functions.sh

# Install Google Chrome.
sudo apt-get -qq update -q
sudo apt-get -qq install dpkg -y -q
wget -nv https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb
sudo dpkg -i google-chrome-stable_current_amd64.deb

# Install Chromedriver.
LATEST_CHROMEDRIVER=$(wget -q -O - http://chromedriver.storage.googleapis.com/LATEST_RELEASE)
wget -nv "http://chromedriver.storage.googleapis.com/$LATEST_CHROMEDRIVER/chromedriver_linux64.zip"
unzip chromedriver_linux64.zip
nohup ./chromedriver &

# Install WDIO.
cd "$ROOT_DIR"/wdio || exit 1
npm install > ./_build.log 2>&1 || ( EC=$?; cat ./_build.log; exit $EC )
