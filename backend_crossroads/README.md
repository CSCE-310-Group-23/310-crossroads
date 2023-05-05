# Setting up the database
*Added by Ryan Kafka, please contact if more information is necessary.*

I have used the database export feature to create a script that can be used to create the crossroads database. <br>
The script is within this directory under the name "crossroads.sql" <br>
<ol>
  <li>Download this "crossroads.sql" file to your local machine.</li>
  <li>Drop existing crossroads database : do one of the following
    <ul>
      <li>Load phpMyAdmin database page (http://localhost/phpmyadmin/index.php?route=/server/databases), select crossroads database, and click drop</li>
      <li>select SQL Tab and enter SQL command  DROP DATABASE `crossroads` (or whatever your previous database was called)</li>
    </ul>
  </li>
  <li>Import Database
    <ol>
      <li>Select 'Import Page'</li>
      <li>Select 'Browse' to select file to import</li>
      <li>Select "crossroads.sql" file attached</li>
      <li>Press import</li>
    </ol>
  </li>
</ol>

You should now have the common copy of the crossroads database in your system. <br>
We need to make all the code compatible with this common database. <br>
If there are any changes need to the scema or data, we have to coordinate with each other to make the change and reexport a new master database script.

