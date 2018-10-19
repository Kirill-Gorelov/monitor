<?php
namespace Linuxparam;

class Monitorlinux{
    public static function uptime(){
        $uptime = file_get_contents('/proc/uptime');
        $uptime_data = explode(' ', $uptime);
        
        $up_days = floor($uptime_data[0] / 86400);
        $up_hours = floor(($uptime_data[0] / 3600) % 24);
        $up_minutes = floor(($uptime_data[0] / 60) % 60);
        $up_seconds = ($uptime_data[0] % 60);
        
        $arr = array(
                    'day' => $up_days,
                    'hour' => $up_hours,
                    'minute' => $up_minutes,
                    'second' => $up_seconds
        );

        return json_encode($arr);
    }
    
    public static function cpu(){
        $cpu = file_get_contents('/proc/loadavg');
        $cpu_data = explode(' ', $cpu);

        $cpu_arr = array(
            '1' => $cpu_data[0],
            '5' => $cpu_data[1],
            '15' => $cpu_data[2]
        );
        return json_encode($cpu_arr);
    }

    public static function meminfo(){
        $meminfo = file('/proc/meminfo');

        $meminfo_total = filter_var($meminfo[0], FILTER_SANITIZE_NUMBER_INT);
        $meminfo_cached = filter_var($meminfo[2], FILTER_SANITIZE_NUMBER_INT);
        $meminfo_free = filter_var($meminfo[1], FILTER_SANITIZE_NUMBER_INT);

        if ($meminfo_total >= 10485760) {
            $mem_total = round(($meminfo_total / 1048576), 2);
            $mem_cached = round(($meminfo_cached / 1048576), 2);
            $mem_free = round((($meminfo_free + $meminfo_cached) / 1048576), 2);
            $mem_multiple = 'GB';
        } else {
            $mem_total = round(($meminfo_total / 1024), 2);
            $mem_cached = round(($meminfo_cached / 1024), 2);
            $mem_free = round((($meminfo_free + $meminfo_cached) / 1024), 2);
            $mem_multiple = 'MB';
        }

        $mem_arr = array(
            'total' => $mem_total,
            'cached' => $mem_cached,
            'free' => $mem_free,
            'measure' => $mem_multiple
        );
        return json_encode($mem_arr);
    }

    public static function disk(){
        $disk_space_total = disk_total_space('/');
        $disk_space_free = disk_free_space('/');

        if ($disk_space_total > 10737418240) {
            $disk_total = round(($disk_space_total / 1073741824), 2);
            $disk_free = round(($disk_space_free / 1073741824), 2);
            $disk_multiple = 'GB';
        } else {
            $disk_total = round(($disk_space_total / 1048576), 2);
            $disk_free = round(($disk_space_free / 1048576), 2);
            $disk_multiple = 'MB';
        }

        $disk_arr = array(
            'total' => $disk_total,
            'free' => $disk_free,
            'used' => $disk_total - $disk_free,
            'measure' => $disk_multiple
        );
        return json_encode($disk_arr);
    }
}

?>