<?php 
	print exec('ffmpeg -i /var/www/html/uploads/video/upload.mp4 -deinterlace -an -ss 1 -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg /var/www/html/uploads/video/tes3.jpeg  2>&1');
Wakwakldalkdlakldalk	?>