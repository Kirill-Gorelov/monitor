# monitor
Php script monitor RAM CPU MEMORY and other param linux server

# Install  
`composer require linuxparam/linuxparam`  
And `/proc/meminfo`, `/proc/loadavg`, `/proc/uptime` chmod 0777

# Use  


```php
<?php
include_once './src/monitor.php';

echo '<pre>';
var_dump(Kirill\Monitorlinux\Monitorlinux::uptime());
var_dump(Kirill\Monitorlinux\Monitorlinux::cpu());
var_dump(Kirill\Monitorlinux\Monitorlinux::meminfo());
var_dump(Kirill\Monitorlinux\Monitorlinux::disk());
echo '</pre>';
?>
```

```html 
string(42) "{"day":0,"hour":12,"minute":48,"second":6}"
string(35) "{"1":"1.06","5":"0.87","15":"0.78"}"
string(176) "{"total":7845.59,"cached":2347.44,"free":3619.44,"measure":"MB"}"
string(183) "{"total":454.50,"free":84.35,"used":370.14,"measure":"GB"}"
```
