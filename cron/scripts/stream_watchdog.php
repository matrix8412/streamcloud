<?php

$streams_file = "/run/streamcloud_files/xml/ffmpeg.xml";
$xml_string = simplexml_load_file($streams_file);


foreach($xml_string->stream as $stream){
    $stream_id = $stream["id"];
    $stream_enable = $stream->{"stream_enable"};
    $channel_name = $stream->channel_name;
    $input_url = $stream->input_url;
    $output_url = $stream->output_url;
    $input_video_decoder = $stream->input_video_decoder;
    $video_codec = $stream->video_parameters->video_codec;
    $video_bitrate = $stream->video_parameters->video_bitrate;
    $video_max_bitrate = $stream->video_parameters->video_min_bitrate;
    $video_min_bitrate = $stream->video_parameters->video_max_bitrate;
    $video_buffer_size = $stream->video_parameters->video_buffer_size;
    $video_profile = $stream->video_parameters->video_profile;
    $video_level = $stream->video_parameters->video_level;
    $video_filter = $stream->video_parameters->video_filter;
    $video_resolution_x = $stream->video_parameters->video_resolution_x;
    $video_resolution_y = $stream->video_parameters->video_resolution_y;
    $video_aspect = $stream->video_parameters->video_aspect;

    $audio_codec = $stream->audio_parameters->audio_codec;
    $audio_bitrate = $stream->audio_parameters->audio_bitrate;
    $audio_channels = $stream->audio_parameters->audio_channels;
    $audio_samplerate = $stream->audio_parameters->audio_sample_rate;

    if($input_video_decoder != ""){$ff_input_video_decoder = "-vcodec \"".$input_video_decoder."\"";}else{$ff_input_video_decoder = "";}
    
    if($video_codec != "copy"){$ff_video_codec = " -vcodec \"$video_codec\"";}else{$ff_video_codec = " -vcodec \"copy\"";}
    if($video_bitrate != "0"){$ff_video_bitrate = " -b:v \"".$video_bitrate."k\"";}else{$ff_video_bitrate = "";}
    if($video_min_bitrate != "0"){$ff_video_min_bitrate = " -minrate \"".$video_min_bitrate."k\"";}else{$ff_video_min_bitrate = "";}
    if($video_max_bitrate != "0"){$ff_video_max_bitrate = " -maxrate \"".$video_max_bitrate."k\"";}else{$ff_video_max_bitrate = "";}
    if($video_buffer_size != "0"){$ff_video_buffer_size = " -bufsize \"".$video_buffer_size."k\"";}else{$ff_video_buffer_size = "";}
    if($video_profile != ""){$ff_video_profile = " -profile:v \"".$video_profile."\"";}else{$ff_video_profile = "";}
    if($video_level != ""){$ff_video_level = " -level \"".$video_level."\"";}else{$ff_video_level = "";}

    $ff_video_parameters = $ff_video_codec.$ff_video_bitrate.$ff_video_min_bitrate.$ff_video_max_bitrate.$ff_video_buffer_size.$ff_video_profile.$ff_video_level;



    if($audio_codec != "copy"){$ff_audio_codec = " -acodec \"".$audio_codec."\"";}else{$ff_sudio_codec = " -acodec \"copy\"";}
    if($audio_bitrate != "0"){$ff_audio_bitrate = " -b:a \"".$audio_bitrate."k\"";}else{$ff_audio_bitrate = "";}
    if($audio_channels != "0"){$ff_audio_channels = " -ac \"".$audio_channels."\"";}else{$ff_audio_channels = "";}
    if($audio_samplerate != "0"){$ff_audio_samplerate = " -ar \"".$audio_samplerate."\"";}else{$ff_audio_samplerate = "";}

    $ff_audio_parameters = $ff_audio_codec.$ff_audio_bitrate;




    if($channel_name != ""){$ff_channel_name = " -metadata service_name=\"".$channel_name."\"";}else{$ff_channel_name = "";}

    $ff_channel_parameters = $ff_channel_name;




    $ffmpeg_cmd = "ffmpeg ".$ff_input_video_decoder." -i \"".$input_url."\"".$ff_video_parameters." -x264-params=\"nal-hrd=cbr\" -preset ultrafast ".$ff_audio_parameters.$ff_channel_parameters." -copyts ".$output_url;
}

$stream_proces_status = exec("ps aux |grep ffmpeg |grep -v grep | wc -l");
if($stream_proces_status == "0"){
    if($stream_enable == "on"){
        echo "Starting stream... \n";
        exec("sudo $ffmpeg_cmd > /dev/null 2>&1 < /dev/null &");
    }
}else{
    if($stream_enable == ""){
        exec("killall -9 ffmpeg");
    }
}



?>
