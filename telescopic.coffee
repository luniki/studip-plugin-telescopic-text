###

 reading.js

 javascript reading system for Telescopic Text
 http://telescopictext.com/

 Date: 21st April 2011
 Version: 0.9.5

 Copyright (c) 2011 Joe Davis

###

jQuery ($) ->
  $(".b").click ->
    $(@).hide().siblings(".c").show()
