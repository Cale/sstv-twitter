#!/bin/bash

PWD=$(pwd)
dir=/home/pi/qsstv/rx_sstv

if [ ! -f "/home/pi/Documents/sstv-twitter/sstv-img-count.dat" ] ; then
	imgcount=0

else
	imgcount=`cat /home/pi/Documents/sstv-twitter/sstv-img-count.dat`
fi

echo "Image count from file: ${imgcount}"

cd ${dir}
shopt -s nullglob 
numfiles=(*)
numfiles=${#numfiles[@]}
cd ${PWD}

newimgcount=$numfiles

newestfile=`ls -t /home/pi/qsstv/rx_sstv/*.png | head -n1`

if (( newimgcount > imgcount )); then
	# Get newest image and post to twitter. Update image count.
	echo "Image count from folder: ${newimgcount}"
	echo "${newimgcount}" > /home/pi/Documents/sstv-twitter/sstv-img-count.dat
	php /home/pi/Documents/sstv-twitter/post-to-twitter.php "$newestfile"
else
	# Do nothing.
	echo "Old count: ${imgcount}"
	echo "New count: ${newimgcount}"
	echo "No new images."
fi

echo "The newest file: ${newestfile}"

