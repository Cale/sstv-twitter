#!/bin/bash

PWD=$(pwd)
dir=/home/pi/qsstv/rx_sstv

cd ${dir}
shopt -s nullglob 
numfiles=(*)
numfiles=${#numfiles[@]}
cd ${PWD}

newimgcount=$numfiles

echo "${newimgcount}" > /home/pi/Documents/sstv-twitter/sstv-img-count.dat
echo "Reset file count in sstv-img-count.dat to ${newimgcount}"
