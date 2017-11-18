#!/bin/sh

mkdir /tmp/streamcloud/packages

wget -O /tmp/streamcloud/packages/fdk-aac.deb https://streamcloud.homepi.org/packages/fdk-aac_201706131805-git-1_armhf.deb

apt-get update;
apt-get upgrade;
apt-get git htop iftop mc;
dpkg -i /tmp/streamcloud/packages/fdk-aac.deb



git clone https://github.com/FFmpeg/FFmpeg.git /tmp/streamcloud/ffmpeg
