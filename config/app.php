<?php

return array(
  "timezone" => "UTC",

  /**
   * Creates a new log file every dailyLogs
   *
   * If false then everything will be logged in a single file
   */
  "dailyLogs" => true,

  /**
   * Specify the file limit for daily logs
   * (eg. if limit is 5 then the log folder will only hold logs from the past 5 days)
   *
   * 0 for unlimited
   */
  "dailyLogLimit" => 0,

  "connection" => array(
      /**
       * Specify the twitch username for the bot
       */
      "username" => "raideeeeer",

      /**
       * Specify the Twitch chat OAuth password
       *
       * You can get your token here: http://www.twitchapps.com/tmi
       */
      "oauth" => "oauth:p5x5wptcvdhotshre5bpq48jjzyu02",

      /**
       * Irc server information
       */
      "ircServer" => array(

        "hostname" => "irc.twitch.tv",
        "port" => 6667

      ),
  ),

);
