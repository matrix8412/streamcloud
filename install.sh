#!/bin/sh

mkdir /tmp/streamcloud/packages

sudo wget -O /tmp/streamcloud/packages/fdk-aac.deb https://streamcloud.homepi.org/packages/fdk-aac_201706131805-git-1_armhf.deb

sudo apt-get update;
sudo apt-get upgrade;
sudo apt-get git htop iftop mc;
sudo apt-get install libomxil-bellagio-dev 
sudo dpkg -i /tmp/streamcloud/packages/fdk-aac.deb;

sudo git clone https://github.com/FFmpeg/FFmpeg.git /tmp/streamcloud/ffmpeg;

cd /tmp/streamcloud/ffmpeg

sudo ./configure --arch=armel --target-os=linux --enable-gpl --enable-omx --enable-omx-rpi --enable-libfdk-aac --enable-nonfree
