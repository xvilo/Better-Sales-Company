FastClick = require 'fastclick/lib/fastclick'
raf = require 'raf'
sectionReady = require './section-ready'

$document = $ document
app = {}

# App entry point
app.setup = ->
  if $.isReady
    app.onDocumentReady()
  else
    $document.on 'ready', app.onDocumentReady

# DOM ready things
app.onDocumentReady = ->
  app.preventFocusStick()
  app.attachFastClick()

  # All other DOM ready things
  sectionReady $document

app.preventFocusStick = ->
  items = document.getElementsByClassName('full-height-image')
  $.each items, (tag) ->
  	#items[tag].firstChild.style.height = items[tag].offsetHeight+"px"
  	
  $document.on 'mousedown', 'a, .pseudo-link, .pseudo-link--styled, button, label, input[type="checkbox"], input[type="radio"]', (event) ->
    raf -> $(event.currentTarget).blur()

app.attachFastClick = -> FastClick.attach document.body

app.setup()

$(window).resize $, ->
    
$(document).ready ->
  event.preventDefault()
  items = document.getElementsByClassName('full-height-image')
  $.each items, (tag) ->
  	items[tag].firstChild.style.height = items[tag].offsetHeight+"px"
  return

$(window).on "resize", (event) ->
  event.preventDefault()
  items = document.getElementsByClassName('full-height-image')
  $.each items, (tag) ->
  	items[tag].firstChild.style.height = items[tag].offsetHeight+"px"
  	
$(".menu-toggle").on "click", (event) ->
  event.preventDefault()
  if $("body").hasClass( "menu-open" )
    $("body").removeClass( "menu-open")
  else
    $("body").addClass( "menu-open")

$(document).ready ->
  $('.menu-item a').on 'click', (event) ->
    event.preventDefault()
    $('html,body').animate { scrollTop: $(@hash).offset().top - 75 }, 500
    $("body").removeClass( "menu-open") 
    return
  return
