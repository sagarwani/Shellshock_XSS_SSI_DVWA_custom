#!/var/www/html/dvwa/vulnerabilities/spc/hackme/bash

echo "Content-type: text/html"
echo ""
echo "<!DOCTYPE html>"
echo "<html>"
echo "<body>"
echo "<div id="frame">"
echo "<p>"
echo "Here are the system details of your machine: <br />"
echo "<br />"
echo "<br />"
echo ""
echo ""
echo "<i>Current user: "
whoami
echo "<br />"
echo "Current date: "
date
echo "<br />"
echo "OS: "
uname
echo "<br />"
lscpu | grep Architecture
echo "<br />"
lscpu | grep Model
echo "<br />"
lscpu | grep Hypervisor
echo "<br />"
echo "<br /></i>"
echo "</p>"
echo "</div>"
echo "</body>"
echo "</html>"
