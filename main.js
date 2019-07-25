$(function() {

    $('#form').on('submit', function(e) {
        e.preventDefault();

        var data = $(this).serialize();
        //quick and dirty function to make it a little easier to validate form
        var dataObj = objectifyArray($(this).serializeArray());

        //ugly way to make sure empty select gets added to dataObj
        if (!dataObj.gender) {
          dataObj.gender = "";
        }
        if (!dataObj.birthYear) {
          dataObj.birthYear = "";
        }
        //regex to double check email
        var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(dataObj.email);

        if (dataObj.first && dataObj.last && dataObj.password && dataObj.email
          && dataObj.gender && dataObj.birthYear && validEmail) {
            var request = $.ajax({
              url: 'form.php',
              type: 'post',
              data: data
            })

            request.done(function(res, status, jqXHR){
              console.log(res)
              if (status === 'success') {
                loadTransition();
              }
            })
        } else {
          //add red font to show invalid
          var keys = Object.keys(dataObj);
          for (var i = 0; i < keys.length; i++) {
            if (!dataObj[keys[i]]) {
              $("#" + keys[i]).addClass("invalid");
            }
          }
          if (!validEmail){
            $("#email").addClass('invalid');
          }
        }

    });

    var loadTransition = function(){
      var topTracks;
      $('#login').fadeOut(400, function(){
        $('#loading').fadeTo(400, 1, function(){
          $.getJSON("http://ws.audioscrobbler.com/2.0/?method=chart.gettoptracks&api_key=eef68a8d6c54c75b973dffcd544e7854&limit=10&format=json&callback=?", function(json) {
            topTracks = json;
            $('#loading').fadeOut(400, function(){
              loadInfo(topTracks);
            })
          });
        })
      })
    }

    var loadInfo = function(topTracks){
      var tracks = topTracks.tracks.track;
      console.log(tracks);
      var heroTrack = tracks[0];
      $('.top-artist').text(heroTrack.artist.name);
      $('.song').text(heroTrack.name);
      $('.plays').text(heroTrack.playcount);

      $.getJSON("http://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=eef68a8d6c54c75b973dffcd544e7854&artist=" + heroTrack.artist.name + "&track=" + heroTrack.name + "&format=json", function(json) {
        $('.hero-img').css("background-image", "url('" + json.track.album.image[3]["#text"] + "')");
      });



      $('.grid-block').each(function(i){
        var self = this
        $.getJSON("http://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=eef68a8d6c54c75b973dffcd544e7854&artist=" + tracks[i+1].artist.name + "&track=" + tracks[i+1].name + "&format=json", function(json) {

          if (json.image) {
            $(self).css("background-image", "url('" + json.track.image[3]["#text"] + "')");
          } else if(json.track && json.track.album && json.track.album.image) {
            $(self).css("background-image", "url('" + json.track.album.image[3]["#text"] + "')");
          } else {
            console.log("here");
            $(self).addClass('no-art');
          }
        });
      })
      $('#info').fadeTo(400, 1, function(){})
    }

    var objectifyArray = function(arr){
      var obj = {};
      for (var i = 0; i < arr.length; i++) {
        obj[arr[i].name] = arr[i].value
      }
      return obj;
    }

    //handlers to remove invalid red on updatex
    $('input').on('input', function(){
      $(this).removeClass('invalid');
    });
    $('select').on('change', function(){
      $(this).removeClass('invalid');
    });


    // cheat to disable login screen
    // $.getJSON("http://ws.audioscrobbler.com/2.0/?method=chart.gettoptracks&api_key=eef68a8d6c54c75b973dffcd544e7854&limit=10&format=json&callback=?", function(json) {
    //   topTracks = json;
    //   $('#loading').fadeOut(400, function(){
    //     loadInfo(topTracks)
    //   })
    // });
});
