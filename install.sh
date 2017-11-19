#!/bin/sh

mkdir -p /opt/streamcloud/sources
mkdir -p /opt/streamcloud/packages
mkdir -p /var/www/html/config

sudo cp /opt/streamcloud/cron_streamcloud /etc/cron.d/
sudo cp /opt/streamcloud/web/* /var/www/html/
chown -R www-data:www-data /var/www/html/*

sudo service cron restart;

sudo apt-get update;
sudo apt-get -y upgrade;
sudo apt-get install git htop iftop mc apache2 php libapache2-mod-php php-xml -y;
sudo apt-get install autoconf automake build-essential cmake git libass-dev libfreetype6-dev libsdl2-dev libtheora-dev libtool libva-dev libvdpau-dev libvorbis-dev libxcb1-dev libxcb-shm0-dev libxcb-xfixes0-dev mercurial pkg-config texinfo wget zlib1g-dev -y;
sudo apt-get install yasm -y;
sudo apt-get install libomxil-bellagio-dev libmp3lame-dev libvpx-dev libopus-dev libx264-dev libx265-dev libfdk-aac-dev -y;
wget -O /opt/streamcloud/packages/libfdk-aac.deb https://streamcloud.homepi.org/packages/fdk-aac_201706131805-git-1_armhf.deb

#sudo git clone https://github.com/FFmpeg/FFmpeg.git /opt/streamcloud/sources/ffmpeg;

#cd /opt/streamcloud/sources/ffmpeg

#sudo ./configure --arch=armel --target-os=linux --enable-gpl --enable-mmal --enable-omx --enable-omx-rpi --enable-libfdk-aac --enable-libmp3lame --enable-libx264 --enable-libx265 --enable-libopus --enable-libvpx --enable-libfreetype --enable-libass --enable-libtheora --enable-libvorbis --enable-nonfree;
#sudo make -j4;
#sudo make install;

