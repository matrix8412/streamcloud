#!/bin/sh

mkdir -p opt/streamcloud/packages
mkdir -p /opt/streamcloud/cron/scripts
mkdir -p /opt/streamcloud/sources

sudo apt-get update;
sudo apt-get -y upgrade;
sudo apt-get -y git htop iftop mc;
sudo apt-get -y install autoconf automake build-essential cmake git libass-dev libfreetype6-dev libsdl2-dev libtheora-dev libtool libva-dev libvdpau-dev libvorbis-dev libxcb1-dev libxcb-shm0-dev libxcb-xfixes0-dev mercurial pkg-config texinfo wget zlib1g-dev;
sudo apt-get -y install yasm;
sudo apt-get -y install libomxil-bellagio-dev libmp3lame-dev libvpx-dev libopus-dev libx264-dev libx265-dev libfdk-aac-dev;

sudo git clone https://github.com/FFmpeg/FFmpeg.git /opt/streamcloud/sources/ffmpeg;

cd /opt/streamcloud/sources/ffmpeg

sudo ./configure --arch=armel --target-os=linux --enable-gpl --enable-mmal --enable-omx --enable-omx-rpi --enable-libfdk-aac --enable-libmp3lame --enable-libx264 --enable-libx265 --enable-libopus --enable-libvpx --enable-libfreetype --enable-libass --enable-libtheora --enable-libvorbis --enable-nonfree;
sudo make -j4;
sudo make install;

git clone 
