--TEST--
RPM Reader tests
--FILE--
<?php
echo rpm_version() . "\n";
$path = dirname(__FILE__) . '/com.test.txt-1-1.x86_64.rpm';
var_dump(rpm_is_valid($path));
var_dump(rpm_is_valid($path . '.invalid'));
$rpmr = rpm_open($path);
$name = rpm_get_tag($rpmr, RPMREADER_NAME);
$ver = rpm_get_tag($rpmr, RPMREADER_VERSION);
$rel = rpm_get_tag($rpmr, RPMREADER_RELEASE);
echo "$name-$ver-$rel\n";
rpm_close($rpmr);
?>
--EXPECTF--
%s
bool(true)

Warning: rpm_is_valid(%s/com.test.txt-1-1.x86_64.rpm.invalid): failed to open stream: No such file or directory in %s line %d
bool(false)
com.test.txt-1-1
